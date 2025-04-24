<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

/** @class StoreActionController */
class StoreActionController extends Controller
{
	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function updateStoreAddress(Request $request): JsonResponse
	{
		try {
			$store = storeController()->findById($request->get('store_id'));
			$store->setAddress($request->get('address'));
			$store->save();
			$store->refresh();
			return response()->json([
				'ack'     => 'success',
				'message' => trans('general.responses.success.data_updated'),
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack'     => 'fail',
				'message' => trans('general.responses.fail.error_occurred'),
			]);
		}
	}
}
