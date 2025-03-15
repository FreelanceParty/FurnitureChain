<?php

use App\ModelControllers\CityController;
use App\ModelControllers\FurnitureCategoryController;
use App\ModelControllers\FurnitureTypeController;
use App\ModelControllers\StoreController;

if ( ! function_exists('cityController')) {
	/*** @return CityController */
	function cityController(): CityController
	{
		return app('cityController');
	}
}
if ( ! function_exists('furnitureCategoryController')) {
	/*** @return FurnitureCategoryController */
	function furnitureCategoryController(): FurnitureCategoryController
	{
		return app('furnitureCategoryController');
	}
}
if ( ! function_exists('furnitureTypeController')) {
	/*** @return FurnitureTypeController */
	function furnitureTypeController(): FurnitureTypeController
	{
		return app('furnitureTypeController');
	}
}
if ( ! function_exists('storeController')) {
	/*** @return StoreController */
	function storeController(): StoreController
	{
		return app('storeController');
	}
}