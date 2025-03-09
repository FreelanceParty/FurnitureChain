<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

/** @class TrustHosts */
class TrustHosts extends Middleware
{
	/**
	 * Get the host patterns that should be trusted.
	 * @return array<int, string|NULL>
	 */
	public function hosts(): array
	{
		return [
			$this->allSubdomainsOfApplicationUrl(),
		];
	}
}
