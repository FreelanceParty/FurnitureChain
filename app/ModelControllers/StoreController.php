<?php

namespace App\ModelControllers;

use App\Exceptions\StoreNotFoundException;
use App\ModelControllers\Repositories\StoreRepository;
use App\Models\Store;

/**
 * Class StoreController
 * @package App\ModelControllers
 */
class StoreController
{
	/*** @var StoreRepository */
	public StoreRepository $repo;

	/**
	 * StoreController constructor.
	 * @param StoreRepository $repo
	 */
	public function __construct(StoreRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return Store
	 * @throws StoreNotFoundException
	 */
	public function findById(int $id): Store
	{
		return $this->repo->findById($id);
	}

}