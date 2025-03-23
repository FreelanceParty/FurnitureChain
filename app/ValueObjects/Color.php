<?php

namespace App\ValueObjects;

/** @class Color */
class Color
{
	/** @var string */
	public const BLACK = 'black';
	/** @var string */
	public const WHITE = 'white';

	/**
	 * @param string $color
	 * @return string
	 */
	public static function getTitleFor(string $color): string
	{
		return trans('general.colors.' . $color);
	}
}