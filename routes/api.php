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
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/products', [ProductController::class, 'index']);
// Route::post('/products',[ProductController::class, 'store'] );
//public route
Route::resource('products', ProductController::class);
Route::group(['middleware'=>['auth:sanctum']],function(){

    //protected route
Route::get('products/search/{name}',[ProductController::class, 'search'] );
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

