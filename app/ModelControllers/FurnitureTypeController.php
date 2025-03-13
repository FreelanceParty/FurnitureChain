<?php

namespace App\ModelControllers;

use App\Exceptions\FurnitureTypeNotFoundException;
use App\ModelControllers\Repositories\FurnitureTypeRepository;
use App\Models\FurnitureType;

/**
 * Class FurnitureTypeController
 * @package App\ModelControllers
 */
class FurnitureTypeController
{
	/*** @var FurnitureTypeRepository */
	public FurnitureTypeRepository $repo;

	/**
	 * FurnitureTypeController constructor.
	 * @param FurnitureTypeRepository $repo
	 */
	public function __construct(FurnitureTypeRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return FurnitureType
	 * @throws FurnitureTypeNotFoundException
	 */
	public function findById(int $id): FurnitureType
	{
		return $this->repo->findById($id);
	}

}