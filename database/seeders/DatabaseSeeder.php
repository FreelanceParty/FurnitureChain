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
		FurnitureCategory::factory(10)->create();
		FurnitureType::factory(10)->create();
		Furniture::factory(10)->create();
		User::factory(10)->create();
	}
}
