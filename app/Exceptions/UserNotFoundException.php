<?php

namespace App\Exceptions;

use Exception;

/**
 * Class UserNotFoundException
 * @package App\Exceptions
 */
class UserNotFoundException extends Exception
{
	/*** Constructor UserNotFoundException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.user_not_found'));
	}
}