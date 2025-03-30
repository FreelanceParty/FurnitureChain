<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use App\Traits\WithImage;
use App\Traits\WithTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @class   FurnitureCategory
 * @property HasMany|NULL $furniture_types
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class FurnitureCategory extends AModel
{
	use HasFactory, WithTitle, WithImage;

	/** @return HasMany|NULL */
	public function furniture_types(): ?HasMany
	{
		return $this->hasMany(FurnitureType::class);
	}
}
