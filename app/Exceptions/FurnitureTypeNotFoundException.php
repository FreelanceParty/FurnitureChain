<?php

namespace App\Exceptions;

use Exception;

/**
 * Class FurnitureTypeNotFoundException
 * @package App\Exceptions
 */
class FurnitureTypeNotFoundException extends Exception
{
	/*** Constructor FurnitureTypeNotFoundException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.furniture_type_not_found'));
	}
}