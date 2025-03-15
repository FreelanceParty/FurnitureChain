<?php

namespace App\Exceptions;

use Exception;

/**
 * Class FurnitureNotFoundException
 * @package App\Exceptions
 */
class FurnitureNotFoundException extends Exception
{
	/*** Constructor FurnitureNotFoundException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.furniture_not_found'));
	}
}