<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\StoreNotFoundException;
use App\Models\Store;
use DB;

/**
 * Class StoreRepository
 * @package App\ModelControllers\Repositories
 */
class StoreRepository
{
	/**
	 * @param int $id
	 * @return Store
	 * @throws StoreNotFoundException()
	 */
	public function findById(int $id): Store
	{
		$store = Store::where('id', '=', $id)->first();
		if ($store === NULL) {
			throw new StoreNotFoundException();
		}
		return $store;
	}

}