<?php

namespace App\Models\Abstracts;

use App\Traits\WithId;
use Illuminate\Database\Eloquent\Model;

/**
 * @class   AModel
 * @package App/Models/Abstracts
 */
abstract class AModel extends Model
{
	use WithId;
}
