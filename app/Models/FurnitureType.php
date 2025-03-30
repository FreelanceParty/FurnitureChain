<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use App\Traits\WithImage;
use App\Traits\WithTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @class   FurnitureType
 * @property HasMany|NULL      $furnitures
 * @property integer           $furniture_category_id
 * @property FurnitureCategory $furniture_category
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class FurnitureType extends AModel
{
	use HasFactory, WithTitle, WithImage;

	/** @return HasMany|NULL */
	public function furnitures(): ?HasMany
	{
		return $this->hasMany(Furniture::class, 'furniture_type_id', 'id');
	}

	/*** @return BelongsTo */
	public function furniture_category(): BelongsTo
	{
		return $this->belongsTo(FurnitureCategory::class);
	}

	/** @return int */
	public function getFurnitureCategoryId(): int
	{
		return $this->furniture_category_id;
	}

	/**
	 * @param int $furnitureCategoryId
	 * @return void
	 */
	public function setFurnitureCategoryId(int $furnitureCategoryId): void
	{
		$this->furniture_category_id = $furnitureCategoryId;
	}

}
