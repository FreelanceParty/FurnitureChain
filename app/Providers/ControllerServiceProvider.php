<?php

namespace App\Providers;

use App\ModelControllers\FurnitureCategoryController;
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
	}
}
