<?php

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
Route::group(['prefix' => '/content'], static function() {
	Route::post('/categories', [ContentController::class, 'getCategoriesContent'])->name('content.categories');
	Route::post('/types', [ContentController::class, 'getTypesContent'])->name('content.types');
	Route::post('/furnitures', [ContentController::class, 'getFurnituresContent'])->name('content.furnitures');
	Route::post('/details', [ContentController::class, 'getFurnitureDetailsContent'])->name('content.details');
});
