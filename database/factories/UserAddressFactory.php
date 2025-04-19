<?php

namespace Database\Factories;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @class UserAddressFactory */
class UserAddressFactory extends Factory
{
	/** @var string */
	protected $model = UserAddress::class;

	/** @return array */
	public function definition(): array
	{
		return [
			'city'         => $this->faker->city,
			'street'       => $this->faker->streetAddress,
			'house_number' => $this->faker->buildingNumber,
		];
	}
}
