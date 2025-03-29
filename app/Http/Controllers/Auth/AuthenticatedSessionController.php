<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

/** @class AuthenticatedSessionController */
class AuthenticatedSessionController extends Controller
{
	/**
	 * @return JsonResponse
	 * @throws Throwable
	 */
	public function create(): JsonResponse
	{
		return response()->json([
			'view' => view('auth.login')->render(),
		]);
	}

	/**
	 * @param LoginRequest $request
	 * @return JsonResponse
	 */
	public function store(LoginRequest $request): JsonResponse
	{
		try {
			$request->authenticate();
			$request->session()->regenerate();
			return response()->json([
				'ack' => 'success',
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack' => 'fail',
			]);
		}
	}

	/**
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function destroy(Request $request): RedirectResponse
	{
		Auth::guard('web')->logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect(RouteServiceProvider::HOME);
	}
}
