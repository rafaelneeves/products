<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'getAllProducts');
    Route::post('/products/create', 'createProducts');
    Route::get('/products/get/{id}', 'getProduct');
    Route::put('/products/update/{id}', 'updateProduct');
    Route::delete('products/delete/{id}','deleteProduct');
});