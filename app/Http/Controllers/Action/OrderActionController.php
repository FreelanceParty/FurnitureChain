<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\Furniture;
use App\Models\Order;
use App\ValueObjects\OrderStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

/** @class OrderActionController */
class OrderActionController extends Controller
{
	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function createOrder(Request $request): JsonResponse
	{
		$user = Auth::user();
		try {
			/** @var Furniture[]|Collection $cartItems */
			$ids         = json_decode($request->get('cart'), FALSE, 512, JSON_THROW_ON_ERROR);
			$cartItems   = furnitureController()->getByIds($ids);
			$totalAmount = 0;
			foreach ($cartItems as $cartItem) {
				$totalAmount += $cartItem->getActualPrice();
			}
			$order = new Order();
			$order->setUserId($user?->getId());
			$order->setUserEmail($request->get('email'));
			$order->setCity($request->get('city'));
			$order->setStreet($request->get('street'));
			$order->setHouseNumber($request->get('house_number'));
			$order->setStatusId(OrderStatus::PENDING);
			$order->setTotalAmount($totalAmount);
			$order->save();
			$order->refresh();
			foreach ($cartItems as $cartItem) {
				$order->order_furnitures()->create([
					'order_id'     => $order->getId(),
					'furniture_id' => $cartItem->getId(),
					'unit_price'   => $cartItem->getActualPrice(),
					'count'        => 1,
					'discount'     => $cartItem->getDiscount() ?? 0,
				]);
			}
			return response()->json([
				'ack'     => 'success',
				'message' => trans('general.responses.success.order_created'),
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack'     => 'fail',
				'message' => trans('general.responses.fail.error_occurred'),
			]);
		}
	}
}
