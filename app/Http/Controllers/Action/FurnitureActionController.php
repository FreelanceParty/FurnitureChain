<?php

namespace App\Http\Controllers\Action;

use App\Exceptions\FurnitureNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Furniture;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Throwable;

/** @class FurnitureActionController */
class FurnitureActionController extends Controller
{
	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function updateFurnitureData(Request $request): JsonResponse
	{
		try {
			try {
				$furniture = furnitureController()->findById($request->get('id'));
				$message   = trans('general.responses.success.furniture_updated');
			} catch (FurnitureNotFoundException) {
				$furniture = new Furniture();
				$message   = trans('general.responses.success.furniture_created');
				$furniture->setFurnitureTypeId($request->get('type_id'));
			}
			$furniture->setTitle($request->get('title'));
			$furniture->setCode($request->get('code'));
			$furniture->setPrice($request->get('price'));
			$furniture->setReadyToShipping($request->has('ready_to_shipping'));
			$furniture->setColor($request->get('color'));
			$furniture->setDiscount($request->get('discount'));
			$furniture->setDiscountEndsAt(Carbon::make($request->get('discount_ends_at')));
			$furniture->setDescription($request->get('description'));
			if ($request->has('image')) {
				$image = Image::make($request->file('image'));
				$furniture->setImage($image->encode('data-url', 80)->encoded);
			} else {
				$furniture->setImage(NULL);
			}
			$cities = json_decode($request->get('cities'), TRUE, 512, JSON_THROW_ON_ERROR);
			foreach ($cities as $cityId => $count) {
				$store = Store::where('city_id', '=', $cityId)->first();
				$store->furnitures()->attach($furniture->getId(), ['count' => $count]);
			}
			$furniture->save();
			return response()->json([
				'ack'     => 'success',
				'typeId'  => $furniture->getFurnitureTypeId(),
				'message' => $message,
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack'     => 'fail',
				'message' => trans('general.responses.fail.error_occurred'),
			]);
		}
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function deleteFurniture(Request $request): JsonResponse
	{
		try {
			$furniture = furnitureController()->findById($request->get('id'));
			$furniture->delete();
			return response()->json([
				'ack'     => 'success',
				'message' => trans('general.responses.success.furniture_deleted'),
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack'     => 'fail',
				'message' => trans('general.responses.fail.error_occurred'),
			]);
		}
	}

}
