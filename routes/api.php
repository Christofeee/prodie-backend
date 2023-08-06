<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PreorderController;

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

Route::get('/test', function (Request $request){
    return "Hello";
});


Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'get_all_products');
});

Route::controller(PreorderController::class)->group(function () {
    Route::get('/preorders', 'get_all_preorders');
    Route::post('/preorders', 'insert_preorder');
});
