<?php

namespace App\Models;

use App\Models\Abstracts\AModel;
use App\Traits\WithTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @class   City
 * @package App/Models
 * @method where(string $column, string $operator, string $value)
 */
class City extends AModel
{
	use HasFactory, WithTitle;
}
