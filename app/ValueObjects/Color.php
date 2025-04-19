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

	/** @return array */
	public static function getAll(): array
	{
		return [
			self::BLACK => trans('general.colors.black'),
			self::WHITE => trans('general.colors.white'),
		];
	}
}