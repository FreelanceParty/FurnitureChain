<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\OrderNotFoundException;
use App\Models\Order;
use DB;

/**
 * Class OrderRepository
 * @package App\ModelControllers\Repositories
 */
class OrderRepository
{
	/**
	 * @param int $id
	 * @return Order
	 * @throws OrderNotFoundException
	 */
	public function findById(int $id): Order
	{
		$order = Order::where('id', '=', $id)->first();
		if ($order === NULL) {
			throw new OrderNotFoundException();
		}
		return $order;
	}

}