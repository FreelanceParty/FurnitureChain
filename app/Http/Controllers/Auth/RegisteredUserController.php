<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Throwable;

/** @class RegisteredUserController */
class RegisteredUserController extends Controller
{
	/**
	 * @return JsonResponse
	 * @throws \Throwable
	 */
	public function create(): JsonResponse
	{
		return response()->json([
			'view' => view('auth.register')->render(),
		]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function store(Request $request): JsonResponse
	{
		try {
			$request->validate([
				'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
				'password' => ['required', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],
			]);
			$user = User::create([
				'email'    => $request->email,
				'password' => Hash::make($request->password),
			]);
			event(new Registered($user));
			Auth::login($user);
			return response()->json([
				'ack' => 'success',
			]);
		} catch (Throwable $e) {
			return response()->json([
				'ack' => 'fail',
			]);
		}
	}
}
