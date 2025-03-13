<?php

use App\ModelControllers\FurnitureCategoryController;
use App\ModelControllers\FurnitureTypeController;

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