<?php

namespace App\Providers;

use App\ModelControllers\CityController;
use App\ModelControllers\FurnitureCategoryController;
use App\ModelControllers\FurnitureController;
use App\ModelControllers\FurnitureTypeController;
use App\ModelControllers\OrderController;
use App\ModelControllers\StoreController;
use App\ModelControllers\UserController;
use Illuminate\Support\ServiceProvider;

/** @class ControllerServiceProvider */
class ControllerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 * @return void
	 */
	public function boot(): void
	{
		$this->app->singleton(CityController::class);
		$this->app->alias(CityController::class, 'cityController');
		$this->app->singleton(FurnitureController::class);
		$this->app->alias(FurnitureController::class, 'furnitureController');
		$this->app->singleton(FurnitureCategoryController::class);
		$this->app->alias(FurnitureCategoryController::class, 'furnitureCategoryController');
		$this->app->singleton(FurnitureTypeController::class);
		$this->app->alias(FurnitureTypeController::class, 'furnitureTypeController');
		$this->app->singleton(StoreController::class);
		$this->app->alias(StoreController::class, 'storeController');
		$this->app->singleton(UserController::class);
		$this->app->alias(UserController::class, 'userController');
		$this->app->singleton(OrderController::class);
		$this->app->alias(OrderController::class, 'orderController');
	}
}
