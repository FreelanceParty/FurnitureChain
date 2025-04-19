<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @class   UserAddress
 * @property User        $user
 * @property int         $user_id
 * @property string|NULL $city
 * @property string|NULL $street
 * @property string|NULL $house_number
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 * @method static where(string $column, string $operator, string $value)
 * @package App/Models
 */
class UserAddress extends AModel
{
	use HasFactory;

	/** @return BelongsTo */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	/** @return int */
	public function getUserId(): int
	{
		return $this->user_id;
	}

	/**
	 * @param int $userId
	 * @return void
	 */
	public function setUserId(int $userId): void
	{
		$this->user_id = $userId;
	}

	/** @return string|NULL */
	public function getCity(): ?string
	{
		return $this->city;
	}

	/**
	 * @param string|NULL $city
	 * @return void
	 */
	public function setCity(?string $city): void
	{
		$this->city = $city;
	}

	/** @return string|NULL */
	public function getStreet(): ?string
	{
		return $this->street;
	}

	/**
	 * @param string|NULL $street
	 * @return void
	 */
	public function setStreet(?string $street): void
	{
		$this->street = $street;
	}

	/** @return string|NULL */
	public function getHouseNumber(): ?string
	{
		return $this->house_number;
	}

	/**
	 * @param string|NULL $houseNumber
	 * @return void
	 */
	public function setHouseNumber(?string $houseNumber): void
	{
		$this->house_number = $houseNumber;
	}

	/** @return Carbon */
	public function getCreatedAt(): Carbon
	{
		return $this->created_at;
	}

	/** @return Carbon */
	public function getUpdatedAt(): Carbon
	{
		return $this->updated_at;
	}

}
