<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\FurnitureNotFoundException;
use App\Models\Furniture;
use DB;

/**
 * Class FurnitureRepository
 * @package App\ModelControllers\Repositories
 */
class FurnitureRepository
{
	/**
	 * @param int $id
	 * @return Furniture
	 * @throws FurnitureNotFoundException
	 */
	public function findById(int $id): Furniture
	{
		$furniture = Furniture::where('id', '=', $id)->first();
		if ($furniture === NULL) {
			throw new FurnitureNotFoundException();
		}
		return $furniture;
	}

	/**
	 * @param string $code
	 * @return Furniture
	 * @throws FurnitureNotFoundException
	 */
	public function findByCode(string $code): Furniture
	{
		$furniture = Furniture::where('code', '=', $code)->first();
		if ($furniture === NULL) {
			throw new FurnitureNotFoundException();
		}
		return $furniture;
	}

}