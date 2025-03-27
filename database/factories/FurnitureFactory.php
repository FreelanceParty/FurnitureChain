<?php

namespace Database\Factories;

use App\Models\Furniture;
use App\Models\FurnitureType;
use App\ValueObjects\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @class FurnitureFactory */
class FurnitureFactory extends Factory
{
	/** @var string */
	protected $model = Furniture::class;

	/** @return array */
	public function definition(): array
	{
		$lastTypeId = FurnitureType::all()->last()->getId();
		return [
			'title'             => $this->faker->words(3, TRUE),
			'code'              => $this->faker->postcode(), // TODO: change
			'price'             => $this->faker->randomNumber(3),
			'furniture_type_id' => $this->faker->numberBetween(1, $lastTypeId),
			'ready_to_shipping' => $this->faker->boolean(80),
			'color'             => $this->faker->randomElement([Color::BLACK, Color::WHITE]),
			'discount'          => $this->faker->randomNumber(2),
			'discount_ends_at'  => NULL,
			'description'       => $this->faker->realText(),
			'image'             => NULL,
		];
	}
}
