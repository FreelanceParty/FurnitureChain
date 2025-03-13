<?php

namespace App\Providers;

use App\ModelControllers\FurnitureCategoryController;
use App\ModelControllers\FurnitureTypeController;
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
		$this->app->singleton(FurnitureCategoryController::class);
		$this->app->alias(FurnitureCategoryController::class, 'furnitureCategoryController');
		$this->app->singleton(FurnitureTypeController::class);
		$this->app->alias(FurnitureTypeController::class, 'furnitureTypeController');
	}
}
