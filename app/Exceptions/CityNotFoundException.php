<?php

namespace App\Exceptions;

use Exception;

/**
 * Class CityNotFoundException
 * @package App\Exceptions
 */
class CityNotFoundException extends Exception
{
	/*** Constructor CityNotFoundException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.city_not_found'));
	}
}