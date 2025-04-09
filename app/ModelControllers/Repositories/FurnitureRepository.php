<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\FurnitureNotFoundException;
use App\Models\Furniture;
use DB;
use Illuminate\Database\Eloquent\Collection;

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

	/**
	 * @param array $ids
	 * @return Collection
	 */
	public function getByIds(array $ids): Collection
	{
		return Furniture::whereIn('id', $ids)->get();
	}

	/**
	 * @param string $search
	 * @return Collection
	 */
	public function getSearched(string $search): Collection
	{
		return Furniture::where('title', 'like', '%' . $search . '%')->get();
	}
}