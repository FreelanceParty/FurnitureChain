<?php

namespace App\ModelControllers;

use App\Exceptions\OrderNotFoundException;
use App\ModelControllers\Repositories\OrderRepository;
use App\Models\Order;

/**
 * Class OrderController
 * @package App\ModelControllers
 */
class OrderController
{
	/*** @var OrderRepository */
	public OrderRepository $repo;

	/**
	 * OrderController constructor.
	 * @param OrderRepository $repo
	 */
	public function __construct(OrderRepository $repo)
	{
		$this->repo = $repo;
	}

	/**
	 * @param int $id
	 * @return Order
	 * @throws OrderNotFoundException
	 */
	public function findById(int $id): Order
	{
		return $this->repo->findById($id);
	}

}