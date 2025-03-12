<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\FurnitureCategoryNotFoundException;
use App\Models\FurnitureCategory;
use DB;

/**
 * Class FurnitureCategoryRepository
 * @package App\ModelControllers\Repositories
 */
class FurnitureCategoryRepository
{
	/**
	 * @param int $id
	 * @return FurnitureCategory
	 * @throws FurnitureCategoryNotFoundException
	 */
	public function findById(int $id): FurnitureCategory
	{
		$category = FurnitureCategory::where('id', '=', $id)->first();
		if ($category === NULL) {
			throw new FurnitureCategoryNotFoundException();
		}
		return $category;
	}

}