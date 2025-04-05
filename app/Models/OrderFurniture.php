<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @class   OrderFurniture
 * @property Order     $order
 * @property integer   $order_id
 * @property Furniture $furniture
 * @property integer   $furniture_id
 * @property float     $unit_price
 * @property integer   $count
 * @property integer   $discount
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class OrderFurniture extends AModel
{
	use HasFactory;

	/** @var string */
	protected $table = 'order_furnitures';

	/*** @var string[] */
	protected $fillable = ['order_id', 'furniture_id', 'unit_price', 'count', 'discount'];

	/** @var boolean */
	public $timestamps = FALSE;

	/** @return BelongsTo */
	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class);
	}

	/** @return BelongsTo */
	public function furniture(): BelongsTo
	{
		return $this->belongsTo(Furniture::class);
	}

	/** @return int */
	public function getOrderId(): int
	{
		return $this->order_id;
	}

	/**
	 * @param int $orderId
	 * @return void
	 */
	public function setOrderId(int $orderId): void
	{
		$this->order_id = $orderId;
	}

	/** @return int */
	public function getFurnitureId(): int
	{
		return $this->furniture_id;
	}

	/**
	 * @param int $furnitureId
	 * @return void
	 */
	public function setFurnitureId(int $furnitureId): void
	{
		$this->furniture_id = $furnitureId;
	}

	/** @return float */
	public function getUnitPrice(): float
	{
		return $this->unit_price;
	}

	/**
	 * @param float $unitPrice
	 * @return void
	 */
	public function setUnitPrice(float $unitPrice): void
	{
		$this->unit_price = $unitPrice;
	}

	/** @return int */
	public function getCount(): int
	{
		return $this->count;
	}

	/**
	 * @param int $count
	 * @return void
	 */
	public function setCount(int $count): void
	{
		$this->count = $count;
	}

	/** @return int */
	public function getDiscount(): int
	{
		return $this->discount;
	}

	/**
	 * @param int $discount
	 * @return void
	 */
	public function setDiscount(int $discount): void
	{
		$this->discount = $discount;
	}
}
