<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @class OrderFactory */
class OrderFactory extends Factory
{
	/** @var string */
	protected $model = Order::class;

	/** @return array */
	public function definition(): array
	{
		return [
			//			'user_id'      => $this->faker->randomNumber(),
			//			'user_email'   => $this->faker->unique()->safeEmail(),
			//			'total_amount' => $this->faker->randomFloat(),
			//			'city'         => $this->faker->city(),
			//			'street'       => $this->faker->streetName(),
			//			'house_number' => $this->faker->word(),
			//			'status_id'    => $this->faker->randomNumber(),
		];
	}
}
