<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'categories'], function () {
    Route::post('/', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/{category}', [CategoryController::class, 'get'])->name('category.get');
    Route::patch('/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'delete'])->name('category.delete');
});

Route::group(['prefix' => 'products'], function () {
    Route::post('/', [ProductController::class, 'create']);
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'get']);
    Route::patch('/{product}', [ProductController::class, 'update']);
    Route::delete('/{product}', [ProductController::class, 'delete']);
});

Route::group(['prefix' => 'dishes'], function () {
    Route::post('/', [DishController::class, 'create']);
    Route::get('/', [DishController::class, 'index']);
    Route::get('/{dish}', [DishController::class, 'get']);
    Route::patch('/{dish}', [DishController::class, 'update']);
    Route::delete('/{dish}', [DishController::class, 'delete']);
});


