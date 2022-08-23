<?php


use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/product/', [ProductController::class, 'index']);
Route::get('/product/{id}',[ProductController::class, 'show']);
Route::get('/products/search/{name}',[ProductController::class, 'search']);

Route::post('/register/',[AuthController::class, 'register']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/product/',[ProductController::class, 'store']);
    Route::put('/product/{id}',[ProductController::class, 'update']);
    Route::delete('/product/{id}',[ProductController::class, 'destroy']);
    Route::post('/logout/',[AuthController::class, 'logout']);
});

//Route::get('/product.list/', [ProductController::class, 'index']);
//
//Route::post('/products.add/',[ProductController::class, 'store']);
//
//Route::post('/product.get/',[ProductController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
