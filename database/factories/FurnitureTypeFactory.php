<?php

namespace Database\Factories;

use App\Models\FurnitureCategory;
use App\Models\FurnitureType;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @class FurnitureCategoryFactory */
class FurnitureTypeFactory extends Factory
{
	/*** @var string */
	protected $model = FurnitureType::class;

	/** @return array */
	public function definition(): array
	{
		$lastCategoryId = FurnitureCategory::all()->last()->getId();
		return [
			'title'                 => $this->faker->words(2, TRUE),
			'furniture_category_id' => $this->faker->numberBetween(1, $lastCategoryId),
		];
	}
}
