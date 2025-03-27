<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @class CityFactory */
class CityFactory extends Factory
{
	/** @var string */
	protected $model = City::class;

	/** @return array */
	public function definition(): array
	{
		return [
			'title' => $this->faker->city(),
		];
	}
}
