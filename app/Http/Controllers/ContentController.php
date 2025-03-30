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
			'html' => view('content.profile')->render(),
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
		$ids = json_decode($request->get('cart'), FALSE, 512, JSON_THROW_ON_ERROR);
		$cartItems   = furnitureController()->getByIds($ids);
		$totalAmount = 0;
		foreach ($cartItems as $cartItem) {
			if ($cartItem->getDiscount() && $cartItem->getDiscountEndsAt() > now()) {
				$totalAmount += $cartItem->getPriceWithDiscount();
			} else {
				$totalAmount += $cartItem->getPrice();
			}
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
}
