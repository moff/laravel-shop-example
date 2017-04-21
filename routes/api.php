<?php

use Illuminate\Http\Request;

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



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\ApiLoginController@login')->name('apilogin');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('products/filter', 'ProductController@filter');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::get('tags/{tag}/products', 'TagController@products')->name('tag.products');
});