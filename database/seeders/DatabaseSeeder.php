<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Furniture;
use App\Models\FurnitureCategory;
use App\Models\FurnitureType;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;
use Intervention\Image\Facades\Image;

/** @class DatabaseSeeder */
class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 * @return void
	 */
	public function run(): void
	{
		City::factory(10)->create();
		Store::factory(10)->create();
		$this->createCategories();
		FurnitureType::factory(10)->create();
		Furniture::factory(10)->create();
		User::factory(10)->create();
	}

	/** @return void */
	private function createCategories(): void
	{
		FurnitureCategory::factory()->create(['title' => 'Вітальня', 'image' => Image::make(public_path('images/living-room.png'))->encode('jpg')->getEncoded()]);
		FurnitureCategory::factory()->create(['title' => 'Передпокій', 'image' => Image::make(public_path('images/entrance-hall.png'))->encode('jpg')->getEncoded()]);
		FurnitureCategory::factory()->create(['title' => 'Спальня', 'image' => Image::make(public_path('images/bedroom.png'))->encode('jpg')->getEncoded()]);
		FurnitureCategory::factory()->create(['title' => 'Ванна', 'image' => Image::make(public_path('images/bathroom.png'))->encode('jpg')->getEncoded()]);
		FurnitureCategory::factory()->create(['title' => 'Кухня', 'image' => Image::make(public_path('images/kitchen.png'))->encode('jpg')->getEncoded()]);
	}
}
