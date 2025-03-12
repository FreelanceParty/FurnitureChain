<?php

namespace App\ModelControllers;

use App\Exceptions\FurnitureCategoryNotFoundException;
use App\ModelControllers\Repositories\FurnitureCategoryRepository;
use App\Models\FurnitureCategory;

/**
 * Class FurnitureCategoryController
 * @package App\ModelControllers
 */
class FurnitureCategoryController
{
	/*** @var FurnitureCategoryRepository */
	public FurnitureCategoryRepository $repo;

	/**
	 * FurnitureCategoryController constructor.
	 * @param FurnitureCategoryRepository $repo
	 */
	public function __construct(FurnitureCategoryRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return FurnitureCategory
	 * @throws FurnitureCategoryNotFoundException
	 */
	public function findById(int $id): FurnitureCategory
	{
		return $this->repo->findById($id);
	}

}