<?php

namespace App\Http\Controllers\Action;

use App\Exceptions\FurnitureCategoryNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\FurnitureCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Throwable;

/** @class FurnitureCategoryActionController */
class FurnitureCategoryActionController extends Controller
{
	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function updateCategoryData(Request $request): JsonResponse
	{
		try {
			try {
				$cat     = furnitureCategoryController()->findById($request->get('id'));
				$message = trans('general.responses.success.category_updated');
			} catch (FurnitureCategoryNotFoundException) {
				$cat     = new FurnitureCategory();
				$message = trans('general.responses.success.category_created');
			}
			$cat->setTitle($request->get('title'));
			if ($request->has('image')) {
				$image = Image::make($request->file('image'));
				$cat->setImage($image->encode('data-url', 80)->encoded);
			} else {
				$cat->setImage(NULL);
			}
			$cat->save();
			return response()->json([
				'ack'     => 'success',
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
	public function deleteCategory(Request $request): JsonResponse
	{
		try {
			$cat = furnitureCategoryController()->findById($request->get('id'));
			$cat->delete();
			return response()->json([
				'ack'     => 'success',
				'message' => trans('general.responses.success.category_deleted'),
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack'     => 'fail',
				'message' => trans('general.responses.fail.error_occurred'),
			]);
		}
	}

}
