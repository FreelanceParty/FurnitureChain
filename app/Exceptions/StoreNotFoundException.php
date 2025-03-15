<?php

namespace App\Exceptions;

use Exception;

/**
 * Class StoreNotFoundException
 * @package App\Exceptions
 */
class StoreNotFoundException extends Exception
{
	/*** Constructor StoreNotFoundException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.store_not_found'));
	}
}