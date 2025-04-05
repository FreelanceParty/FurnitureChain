<?php

use App\ModelControllers\CityController;
use App\ModelControllers\FurnitureCategoryController;
use App\ModelControllers\FurnitureController;
use App\ModelControllers\FurnitureTypeController;
use App\ModelControllers\OrderController;
use App\ModelControllers\StoreController;
use App\ModelControllers\UserController;

if ( ! function_exists('cityController')) {
	/*** @return CityController */
	function cityController(): CityController
	{
		return app('cityController');
	}
}
if ( ! function_exists('furnitureController')) {
	/*** @return FurnitureController */
	function furnitureController(): FurnitureController
	{
		return app('furnitureController');
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
if ( ! function_exists('userController')) {
	/*** @return UserController */
	function userController(): UserController
	{
		return app('userController');
	}
}
if ( ! function_exists('orderController')) {
	/*** @return OrderController */
	function orderController(): OrderController
	{
		return app('orderController');
	}
}