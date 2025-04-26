<?php

namespace App\Http\Controllers\Action;

use App\Exceptions\FurnitureTypeNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\FurnitureType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Throwable;

/** @class FurnitureTypeActionController */
class FurnitureTypeActionController extends Controller
{
	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function updateTypeData(Request $request): JsonResponse
	{
		try {
			try {
				$type    = furnitureTypeController()->findById($request->get('id'));
				$message = trans('general.responses.success.type_updated');
			} catch (FurnitureTypeNotFoundException) {
				$type    = new FurnitureType();
				$message = trans('general.responses.success.type_created');
				$type->setFurnitureCategoryId($request->get('category_id'));
			}
			$type->setTitle($request->get('title'));
			if ($request->has('image')) {
				$image = Image::make($request->file('image'));
				$type->setImage($image->encode('data-url', 80)->encoded);
			} else {
				$type->setImage(NULL);
			}
			$type->save();
			return response()->json([
				'ack'        => 'success',
				'categoryId' => $type->getFurnitureCategoryId(),
				'message'    => $message,
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
	public function deleteType(Request $request): JsonResponse
	{
		try {
			$type = furnitureTypeController()->findById($request->get('id'));
			$type->delete();
			return response()->json([
				'ack'     => 'success',
				'message' => trans('general.responses.success.type_deleted'),
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack'     => 'fail',
				'message' => trans('general.responses.fail.error_occurred'),
			]);
		}
	}

}
