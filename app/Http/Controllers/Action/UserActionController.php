<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

/** @class UserActionController */
class UserActionController extends Controller
{
	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function updatePersonalData(Request $request): JsonResponse
	{
		try {
			$user = Auth::user();
			$user->setEmail($request->get('email'));
			$user->setPassword(Hash::make($request->get('password')));
			$user->setFirstName($request->get('first_name'));
			$user->setLastName($request->get('last_name'));
			$user->save();
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
