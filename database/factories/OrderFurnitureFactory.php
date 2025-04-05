<?php

namespace Database\Factories;

use App\Models\OrderFurniture;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @class OrderFurnitureFactory */
class OrderFurnitureFactory extends Factory
{
	/** @var string */
	protected $model = OrderFurniture::class;

	/** @return array */
	public function definition(): array
	{
		//		return [
		//			'order_id'     => $this->faker->randomNumber(),
		//			'furniture_id' => $this->faker->randomNumber(),
		//			'user_email'   => $this->faker->unique()->safeEmail(),
		//			'unit_price'   => $this->faker->randomFloat(),
		//			'count'        => $this->faker->randomNumber(),
		//			'discount'     => $this->faker->randomNumber(),
		//		];
	}
}
