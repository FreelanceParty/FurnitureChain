<?php

namespace App\Http\Controllers;

use App\Exceptions\FurnitureNotFoundException;
use App\Models\Furniture;
use App\Models\FurnitureCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

/** @class ContentController */
class ContentController extends Controller
{
	/** @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\View\View */
	public function index()
	{
		return view('welcome', [
			'categories' => FurnitureCategory::all(),
		]);
	}

	/**
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function getLoginContent(): JsonResponse
	{
		return response()->json([
			'html' => view('auth.login')->render(),
		]);
	}

	/**
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function getRegisterContent(): JsonResponse
	{
		return response()->json([
			'html' => view('auth.register')->render(),
		]);
	}

	/**
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function getProfileContent(): JsonResponse
	{
		return response()->json([
			'html' => view('content.profile', [
				'authUser' => Auth::user(),
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function getCartContent(Request $request): JsonResponse
	{
		/** @var Furniture[]|Collection $cartItems */
		$ids         = json_decode($request->get('cart'), FALSE, 512, JSON_THROW_ON_ERROR);
		$cartItems   = furnitureController()->getByIds($ids);
		$totalAmount = 0;
		foreach ($cartItems as $cartItem) {
			$totalAmount += $cartItem->getActualPrice();
		}
		return response()->json([
			'html' => view('content.cart', [
				'totalAmount' => $totalAmount,
				'cartItems'   => $cartItems,
			])->render(),
		]);
	}

	/**
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function getCategoriesContent(): JsonResponse
	{
		return response()->json([
			'html' => view('content.categories', [
				'categories' => FurnitureCategory::all(),
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function getTypesContent(Request $request): JsonResponse
	{
		$category = furnitureCategoryController()->findById($request->get('category_id'));
		return response()->json([
			'html' => view('content.types', [
				'category' => $category,
				'types'    => $category->furniture_types,
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function getFurnituresContent(Request $request): JsonResponse
	{
		$type = furnitureTypeController()->findById($request->get('type_id'));
		return response()->json([
			'html' => view('content.furnitures', [
				'type'       => $type,
				'category'   => $type->furniture_category,
				'furnitures' => $type->furnitures,
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getFurnitureDetailsContent(Request $request): JsonResponse
	{
		$furniture = furnitureController()->findById($request->get('furniture_id'));
		return response()->json([
			'html' => view('content.details', [
				'type'      => $furniture->furniture_type,
				'category'  => $furniture->furniture_type->furniture_category,
				'furniture' => $furniture,
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getConfirmOrderContent(Request $request): JsonResponse
	{
		return response()->json([
			'html' => view('content.confirm_order', [
				'authUser' => Auth::user(),
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getOrderDetailsContent(Request $request): JsonResponse
	{
		$order = orderController()->findById($request->get('order_id'));
		return response()->json([
			'html' => view('content.order_details', [
				'authUser' => Auth::user(),
				'order'    => $order,
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getUserOrdersContent(Request $request): JsonResponse
	{
		$authUser = Auth::user();
		return response()->json([
			'html' => view('content.user_orders', [
				'authUser' => $authUser,
				'orders'   => $authUser->orders,
			])->render(),
		]);
	}
}
