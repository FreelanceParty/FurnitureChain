<?php

namespace App\ValueObjects;

use App\Exceptions\NotImplementedException;

/** @class OrderStatus */
class OrderStatus
{
	/** @var integer */
	public const PENDING = 0;
	/** @var integer */
	public const COMPLETED = 1;
	/** @var integer */
	public const DECLINED = 2;

	/**
	 * @param int $statusId
	 * @return string
	 * @throws NotImplementedException
	 */
	public static function getTitleFor(int $statusId): string
	{
		return match ($statusId) {
			self::COMPLETED => trans('general.statuses.completed'),
			self::DECLINED => trans('general.statuses.declined'),
			self::PENDING => trans('general.statuses.pending'),
			default => throw new NotImplementedException(),
		};
	}

	/**
	 * @param int $statusId
	 * @return string
	 * @throws NotImplementedException
	 */
	public static function getColorFor(int $statusId): string
	{
		return match ($statusId) {
			self::COMPLETED => 'green',
			self::DECLINED => 'red',
			self::PENDING => 'yellow',
			default => throw new NotImplementedException(),
		};
	}
}