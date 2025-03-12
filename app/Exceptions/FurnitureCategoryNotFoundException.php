<?php

namespace App\Exceptions;

use Exception;

/**
 * Class FurnitureCategoryNotFoundException
 * @package App\Exceptions
 */
class FurnitureCategoryNotFoundException extends Exception
{
	/*** Constructor FurnitureCategoryNotFoundException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.furniture_category_not_found'));
	}
}