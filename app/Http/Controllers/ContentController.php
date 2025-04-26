<?php

namespace App\Http\Controllers;

use App\Exceptions\FurnitureCategoryNotFoundException;
use App\Exceptions\FurnitureNotFoundException;
use App\Exceptions\FurnitureTypeNotFoundException;
use App\Models\City;
use App\Models\Furniture;
use App\Models\FurnitureCategory;
use App\Models\Store;
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
			'authUser'   => Auth::user(),
			'categories' => FurnitureCategory::all(),
			'cities'     => City::all(),
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
		$authUser = Auth::user();
		return response()->json([
			'html' => view('content.profile', [
				'authUser' => $authUser,
				'address'  => $authUser->address,
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
		$cart        = $request->get('cart') ?? [];
		$totalAmount = 0;
		if ( ! empty($cart)) {
			$ids       = json_decode($cart, FALSE, 512, JSON_THROW_ON_ERROR);
			$cartItems = furnitureController()->getByIds($ids);
			foreach ($cartItems as $cartItem) {
				$totalAmount += $cartItem->getActualPrice();
			}
		}
		return response()->json([
			'html' => view('content.cart', [
				'authUser'    => Auth::user(),
				'totalAmount' => $totalAmount,
				'cartItems'   => $cartItems ?? [],
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
				'authUser'   => Auth::user(),
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
				'authUser' => Auth::user(),
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
				'authUser'   => Auth::user(),
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
				'authUser'  => Auth::user(),
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
		$authUser = Auth::user();
		return response()->json([
			'html' => view('content.confirm_order', [
				'authUser' => $authUser,
				'address'  => $authUser?->address,
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

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getSearchedFurnituresContent(Request $request): JsonResponse
	{
		$authUser = Auth::user();
		return response()->json([
			'html' => view('content.furnitures', [
				'authUser'   => $authUser,
				'furnitures' => furnitureController()->getSearched($request->get('search')),
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getFilteredFurnituresContent(Request $request): JsonResponse
	{
		$authUser = Auth::user();
		return response()->json([
			'html' => view('content.furnitures', [
				'authUser'   => $authUser,
				'furnitures' => furnitureController()->getFiltered($request->get('filters')),
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getPayShipContent(Request $request): JsonResponse
	{
		$authUser = Auth::user();
		return response()->json([
			'html' => view('content.pay_ship_info', [
				'authUser' => $authUser,
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException|Throwable
	 */
	public function getOurStoresContent(Request $request): JsonResponse
	{
		$authUser = Auth::user();
		$stores   = Store::all();
		return response()->json([
			'html' => view('content.our_stores', [
				'authUser' => $authUser,
				'stores'   => $stores,
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException
	 * @throws Throwable
	 */
	public function getEditCategoryContent(Request $request): JsonResponse
	{
		try {
			$cat = furnitureCategoryController()->findById($request->get('id'));
		} catch (FurnitureCategoryNotFoundException $e) {
		}
		return response()->json([
			'html' => view('content.editable.category_edit', [
				'authUser' => Auth::user(),
				'category' => $cat ?? NULL,
			])->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 * @throws FurnitureNotFoundException
	 * @throws Throwable
	 */
	public function getEditTypeContent(Request $request): JsonResponse
	{
		try {
			$type = furnitureTypeController()->findById($request->get('id'));
		} catch (FurnitureTypeNotFoundException $e) {
		}
		return response()->json([
			'html' => view('content.editable.type_edit', [
				'authUser'    => Auth::user(),
				'type'        => $type ?? NULL,
				'categoryId' => $request->get('category_id'),
			])->render(),
		]);
	}
}
