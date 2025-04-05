<?php

namespace App\Exceptions;

use Exception;

/**
 * Class NotImplementedException
 * @package App\Exceptions
 */
class NotImplementedException extends Exception
{
	/*** Constructor NotImplementedException */
	public function __construct()
	{
		parent::__construct(trans('general.exceptions.not_implemented'));
	}
}