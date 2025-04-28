<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @class   FurnitureStore
 * @property Store     $store
 * @property integer   $store_id
 * @property Furniture $furniture
 * @property integer   $furniture_id
 * @property integer   $count
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class FurnitureStore extends AModel
{
	use HasFactory;

	/** @var string */
	protected $table = 'furniture_stores';

	/*** @var string[] */
	protected $fillable = ['store_id', 'furniture_id', 'count'];

	/** @var boolean */
	public $timestamps = FALSE;

	/** @return BelongsTo */
	public function store(): BelongsTo
	{
		return $this->belongsTo(Store::class);
	}

	/** @return BelongsTo */
	public function furniture(): BelongsTo
	{
		return $this->belongsTo(Furniture::class);
	}

	/** @return int */
	public function getStoreId(): int
	{
		return $this->store_id;
	}

	/**
	 * @param int $storeId
	 * @return void
	 */
	public function setStoreId(int $storeId): void
	{
		$this->order_id = $storeId;
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

}
