<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\FurnitureTypeNotFoundException;
use App\Models\FurnitureType;
use DB;

/**
 * Class FurnitureTypeRepository
 * @package App\ModelControllers\Repositories
 */
class FurnitureTypeRepository
{
	/**
	 * @param int $id
	 * @return FurnitureType
	 * @throws FurnitureTypeNotFoundException
	 */
	public function findById(int $id): FurnitureType
	{
		$type = FurnitureType::where('id', '=', $id)->first();
		if ($type === NULL) {
			throw new FurnitureTypeNotFoundException();
		}
		return $type;
	}

}