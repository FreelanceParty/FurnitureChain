<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use App\Traits\WithImage;
use App\Traits\WithTitle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @class   Furniture
 * @property string        $code
 * @property float         $price
 * @property integer       $furniture_type_id
 * @property FurnitureType $furniture_type
 * @property bool          $ready_to_shipping
 * @property string        $color
 * @property integer|NULL  $discount
 * @property Carbon|NULL   $discount_ends_at
 * @property string|NULL   $description
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class Furniture extends AModel
{
	use HasFactory, WithTitle, WithImage;

	/** @var string */
	protected $table = 'furnitures';

	/*** @return BelongsTo */
	public function furniture_type(): BelongsTo
	{
		return $this->belongsTo(FurnitureType::class);
	}

	/** @return string */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 * @return void
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/** @return float */
	public function getPrice(): float
	{
		return $this->price;
	}

	/**
	 * @param float $price
	 * @return void
	 */
	public function setPrice(float $price): void
	{
		$this->price = $price;
	}

	/*** @return float */
	public function getPriceWithDiscount(): float
	{
		return $this->price - ($this->price * $this->discount / 100);
	}

	/** @return int */
	public function getFurnitureTypeId(): int
	{
		return $this->furniture_type_id;
	}

	/**
	 * @param int $furnitureTypeId
	 * @return void
	 */
	public function setFurnitureTypeId(int $furnitureTypeId): void
	{
		$this->furniture_type_id = $furnitureTypeId;
	}

	/** @return bool */
	public function isReadyToShipping(): bool
	{
		return $this->ready_to_shipping;
	}

	/**
	 * @param bool $readyToShipping
	 * @return void
	 */
	public function setReadyToShipping(bool $readyToShipping): void
	{
		$this->ready_to_shipping = $readyToShipping;
	}

	/** @return string */
	public function getColor(): string
	{
		return $this->color;
	}

	/**
	 * @param string $color
	 * @return void
	 */
	public function setColor(string $color): void
	{
		$this->color = $color;
	}

	/** @return int|NULL */
	public function getDiscount(): ?int
	{
		return $this->discount;
	}

	/**
	 * @param int|NULL $discount
	 * @return void
	 */
	public function setDiscount(?int $discount): void
	{
		$this->discount = $discount;
	}

	/** @return Carbon|NULL */
	public function getDiscountEndsAt(): ?Carbon
	{
		return $this->discount_ends_at;
	}

	/**
	 * @param Carbon|NULL $discountEndsAt
	 * @return void
	 */
	public function setDiscountEndsAt(?Carbon $discountEndsAt): void
	{
		$this->discount_ends_at = $discountEndsAt;
	}

	/** @return string|NULL */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param string|NULL $description
	 * @return void
	 */
	public function setDescription(?string $description): void
	{
		$this->description = $description;
	}

}
