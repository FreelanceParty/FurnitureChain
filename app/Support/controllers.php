<?php

use App\ModelControllers\FurnitureCategoryController;

if ( ! function_exists('furnitureCategoryController')) {
	/*** @return FurnitureCategoryController */
	function furnitureCategoryController(): FurnitureCategoryController
	{
		return app('furnitureCategoryController');
	}
}