<?php

use App\Http\Controllers\Action\FurnitureActionController;
use App\Http\Controllers\Action\FurnitureCategoryActionController;
use App\Http\Controllers\Action\FurnitureTypeActionController;
use App\Http\Controllers\Action\OrderActionController;
use App\Http\Controllers\Action\StoreActionController;
use App\Http\Controllers\Action\UserActionController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [ContentController::class, 'index'])->name('index');
Route::group(['prefix' => '/action'], static function() {
	Route::post('/create_order', [OrderActionController::class, 'createOrder'])->name('action.create-order');
	Route::group(['middleware' => 'auth'], static function() {
		Route::post('/update_personal_data', [UserActionController::class, 'updatePersonalData'])->name('action.update-personal-data');
		Route::post('/update_user_address', [UserActionController::class, 'updateUserAddress'])->name('action.update-user-address');
		Route::post('/update_store_address', [StoreActionController::class, 'updateStoreAddress'])->name('action.update-store-address');
		Route::post('/update_category', [FurnitureCategoryActionController::class, 'updateCategoryData'])->name('action.update-category-data');
		Route::post('/delete_category', [FurnitureCategoryActionController::class, 'deleteCategory'])->name('action.delete-category');
		Route::post('/update_type', [FurnitureTypeActionController::class, 'updateTypeData'])->name('action.update-type-data');
		Route::post('/delete_type', [FurnitureTypeActionController::class, 'deleteType'])->name('action.delete-type');
		Route::post('/update_furniture', [FurnitureActionController::class, 'updateFurnitureData'])->name('action.update-furniture-data');
		Route::post('/delete_furniture', [FurnitureActionController::class, 'deleteFurniture'])->name('action.delete-furniture');
	});
});
Route::group(['prefix' => '/content'], static function() {
	Route::post('/login', [ContentController::class, 'getLoginContent'])->name('content.login');
	Route::post('/register', [ContentController::class, 'getRegisterContent'])->name('content.register');
	Route::post('/cart', [ContentController::class, 'getCartContent'])->name('content.cart');
	Route::post('/profile', [ContentController::class, 'getProfileContent'])->name('content.profile');
	Route::post('/categories', [ContentController::class, 'getCategoriesContent'])->name('content.categories');
	Route::post('/types', [ContentController::class, 'getTypesContent'])->name('content.types');
	Route::post('/furnitures', [ContentController::class, 'getFurnituresContent'])->name('content.furnitures');
	Route::post('/details', [ContentController::class, 'getFurnitureDetailsContent'])->name('content.details');
	Route::post('/confirm_order', [ContentController::class, 'getConfirmOrderContent'])->name('content.confirm-order');
	Route::post('/order_details', [ContentController::class, 'getOrderDetailsContent'])->name('content.order-details');
	Route::post('/user_orders', [ContentController::class, 'getUserOrdersContent'])->name('content.user-orders');
	Route::post('/furniture_search', [ContentController::class, 'getSearchedFurnituresContent'])->name('content.furniture-search');
	Route::post('/furniture_filter', [ContentController::class, 'getFilteredFurnituresContent'])->name('content.furniture-filter');
	Route::post('/pay_ship_info', [ContentController::class, 'getPayShipContent'])->name('content.pay-ship-info');
	Route::post('/our_stores', [ContentController::class, 'getOurStoresContent'])->name('content.our-stores');
	Route::post('/edit_category', [ContentController::class, 'getEditCategoryContent'])->name('content.edit-category');
	Route::post('/edit_type', [ContentController::class, 'getEditTypeContent'])->name('content.edit-type');
	Route::post('/edit_furniture', [ContentController::class, 'getEditFurnitureContent'])->name('content.edit-furniture');
});
require __DIR__ . '/auth.php';
