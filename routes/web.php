<?php

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
	Route::group(['middleware' => 'auth'], static function() {
		Route::post('/update_personal_data', [UserActionController::class, 'updatePersonalData'])->name('action.update-personal-data');
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
});
require __DIR__ . '/auth.php';
