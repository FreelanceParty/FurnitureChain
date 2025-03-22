<?php

namespace App\ModelControllers;

use App\Exceptions\FurnitureNotFoundException;
use App\ModelControllers\Repositories\FurnitureRepository;
use App\Models\Furniture;

/**
 * Class FurnitureController
 * @package App\ModelControllers
 */
class FurnitureController
{
	/*** @var FurnitureRepository */
	public FurnitureRepository $repo;

	/**
	 * FurnitureController constructor.
	 * @param FurnitureRepository $repo
	 */
	public function __construct(FurnitureRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return Furniture
	 * @throws FurnitureNotFoundException
	 */
	public function findById(int $id): Furniture
	{
		return $this->repo->findById($id);
	}

	/**
	 * @param string $code
	 * @return Furniture
	 * @throws FurnitureNotFoundException
	 */
	public function findByCode(string $code): Furniture
	{
		return $this->repo->findByCode($code);
	}

}