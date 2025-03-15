<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @class   Store
 * @property integer $city_id
 * @property City    $city
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class Store extends AModel
{
	use HasFactory;

	/*** @return BelongsTo */
	public function city(): BelongsTo
	{
		return $this->belongsTo(City::class);
	}

	/** @return int */
	public function getCityId(): int
	{
		return $this->city_id;
	}

	/**
	 * @param int $cityId
	 * @return void
	 */
	public function setCityId(int $cityId): void
	{
		$this->city_id = $cityId;
	}

}
