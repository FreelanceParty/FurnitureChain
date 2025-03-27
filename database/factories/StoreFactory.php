<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @class StoreFactory */
class StoreFactory extends Factory
{
	/** @var string */
	protected $model = Store::class;

	/** @return array */
	public function definition(): array
	{
		$lastCityId = City::all()->last()->getId();
		return [
			'city_id' => $this->faker->numberBetween(1, $lastCityId),
		];
	}
}
