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
		$this->createTypes();
		Furniture::factory(15)->create();
		User::factory(10)->create();
	}

	/** @return void */
	private function createCategories(): void
	{
		FurnitureCategory::factory()->create(['title' => 'Вітальня', 'image' => Image::make(public_path('images/living-room.png'))->encode('data-url', 80)->getEncoded()]);
		FurnitureCategory::factory()->create(['title' => 'Передпокій', 'image' => Image::make(public_path('images/entrance-hall.png'))->encode('data-url', 80)->getEncoded()]);
		FurnitureCategory::factory()->create(['title' => 'Спальня', 'image' => Image::make(public_path('images/bedroom.png'))->encode('data-url', 80)->getEncoded()]);
		FurnitureCategory::factory()->create(['title' => 'Ванна', 'image' => Image::make(public_path('images/bathroom.png'))->encode('data-url', 80)->getEncoded()]);
	}

	/** @return void */
	private function createTypes(): void
	{
		// ===== ВІТАЛЬНЯ ===== //
		FurnitureType::factory()->create(['title' => 'Книжкові полиці', 'image' => Image::make('https://images.prom.ua/4053189192_w600_h600_4053189192.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 1]);
		FurnitureType::factory()->create(['title' => 'Журнальні столики', 'image' => Image::make('https://fenster.ua/resize/options/11n11ya_viber_112024-05-30_14-11-51-031.800x800.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 1]);
		FurnitureType::factory()->create(['title' => 'Тумби під телевізор', 'image' => Image::make('https://stylbest.com.ua/media/images/products/19132/th2_tumba_pod_televizor_fkm_tv-15_seriya_domino_6017c46c79eeb.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 1]);
		FurnitureType::factory()->create(['title' => 'Настінні полиці', 'image' => Image::make('https://tahta.com.ua/files/resized/products/np-13-pravaya-oreh-temnyj.560x560-1.1540x945.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 1]);
		// ===== ПЕРЕДПОКІЙ ===== //
		FurnitureType::factory()->create(['title' => 'Тумби для взуття', 'image' => Image::make('https://images.prom.ua/4800669375_w600_h600_4800669375.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 2]);
		FurnitureType::factory()->create(['title' => 'Шафи в передпокій', 'image' => Image::make('https://cdn.27.ua/sc--media--prod/default/e5/ba/82/e5ba827f-eda1-457d-9aff-d5ae533b8755.jpeg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 2]);
		FurnitureType::factory()->create(['title' => 'Вішалки', 'image' => Image::make('https://mebelnuy.com.ua/image/catalog/goods/image/80/800b2505-3f9b-11ee-9180-901b0ee5564d_0.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 2]);
		// ===== СПАЛЬНЯ ===== //
		FurnitureType::factory()->create(['title' => 'Комоди', 'image' => Image::make('https://images.prom.ua/5145175152_komod-na-3.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 3]);
		FurnitureType::factory()->create(['title' => 'Тумби', 'image' => Image::make('https://woodman.ua/cdn/shop/files/prylizhkova-tumba-z-polychkoyu-dub1.jpg?v=1744472833')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 3]);
		FurnitureType::factory()->create(['title' => 'Ліжка', 'image' => Image::make('https://ultima-sleep.com.ua/content/images/21/480x480l50nn0/copy_lizhko-style620-32098996233408.png')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 3]);
		// ===== ВАННА ===== //
		FurnitureType::factory()->create(['title' => 'Пенали', 'image' => Image::make('https://images.prom.ua/4356041660_w600_h600_4356041660.jpg')->encode('data-url', 80)->getEncoded(), 'furniture_category_id' => 4]);
	}
}
