<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @class   Order
 * @property User|NULL        $user
 * @property integer|NULL     $user_id
 * @property string           $user_email
 * @property OrderFurniture[] $order_furnitures
 * @property string           $city
 * @property string           $street
 * @property string           $house_number
 * @property integer          $status_id
 * @property float            $total_amount
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class Order extends AModel
{
	use HasFactory;

	/*** @return BelongsTo|NULL */
	public function user(): ?BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	/*** @return HasMany */
	public function order_furnitures(): HasMany
	{
		return $this->hasMany(OrderFurniture::class);
	}

	/** @return int|NULL */
	public function getUserId(): ?int
	{
		return $this->user_id;
	}

	/**
	 * @param int|NULL $userId
	 * @return void
	 */
	public function setUserId(?int $userId): void
	{
		$this->user_id = $userId;
	}

	/** @return string */
	public function getUserEmail(): string
	{
		return $this->user_email;
	}

	/**
	 * @param string $user_email
	 * @return void
	 */
	public function setUserEmail(string $user_email): void
	{
		$this->user_email = $user_email;
	}

	/** @return string */
	public function getCity(): string
	{
		return $this->city;
	}

	/**
	 * @param string $city
	 * @return void
	 */
	public function setCity(string $city): void
	{
		$this->city = $city;
	}

	/** @return string */
	public function getStreet(): string
	{
		return $this->street;
	}

	/**
	 * @param string $street
	 * @return void
	 */
	public function setStreet(string $street): void
	{
		$this->street = $street;
	}

	/** @return string */
	public function getHouseNumber(): string
	{
		return $this->house_number;
	}

	/**
	 * @param string $houseNumber
	 * @return void
	 */
	public function setHouseNumber(string $houseNumber): void
	{
		$this->house_number = $houseNumber;
	}

	/** @return float */
	public function getTotalAmount(): float
	{
		return $this->total_amount;
	}

	/**
	 * @param float $totalAmount
	 * @return void
	 */
	public function setTotalAmount(float $totalAmount): void
	{
		$this->total_amount = $totalAmount;
	}

	/** @return int */
	public function getStatusId(): int
	{
		return $this->status_id;
	}

	/**
	 * @param int $statusId
	 * @return void
	 */
	public function setStatusId(int $statusId): void
	{
		$this->status_id = $statusId;
	}

}
