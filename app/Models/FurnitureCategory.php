<?php

namespace App\Models;

use App\Traits\WithId;
use App\Traits\WithTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class   FurnitureCategory
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class FurnitureCategory extends Model
{
	use HasFactory, WithId, WithTitle;
}
