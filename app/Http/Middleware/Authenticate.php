<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/** @class Authenticate */
class Authenticate extends Middleware
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 * @param Request $request
	 * @return string|NULL
	 */
	protected function redirectTo(Request $request): ?string
	{
		return $request->expectsJson() ? NULL : route('login');
	}
}
