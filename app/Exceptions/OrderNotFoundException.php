<?php

namespace App\Exceptions;

use Exception;

/**
 * Class OrderNotFoundException
 * @package App\Exceptions
 */
class OrderNotFoundException extends Exception
{
	/*** Constructor OrderNotFoundException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.order_not_found'));
	}
}