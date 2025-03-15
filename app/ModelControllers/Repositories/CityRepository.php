<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\CityNotFoundException;
use App\Models\City;
use DB;

/**
 * Class CityRepository
 * @package App\ModelControllers\Repositories
 */
class CityRepository
{
	/**
	 * @param int $id
	 * @return City
	 * @throws CityNotFoundException
	 */
	public function findById(int $id): City
	{
		$city = City::where('id', '=', $id)->first();
		if ($city === NULL) {
			throw new CityNotFoundException();
		}
		return $city;
	}

}