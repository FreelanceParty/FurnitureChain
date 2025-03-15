<?php

namespace App\ModelControllers;

use App\Exceptions\CityNotFoundException;
use App\ModelControllers\Repositories\CityRepository;
use App\Models\City;

/**
 * Class CityController
 * @package App\ModelControllers
 */
class CityController
{
	/*** @var CityRepository */
	public CityRepository $repo;

	/**
	 * CityController constructor.
	 * @param CityRepository $repo
	 */
	public function __construct(CityRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return City
	 * @throws CityNotFoundException
	 */
	public function findById(int $id): City
	{
		return $this->repo->findById($id);
	}

}