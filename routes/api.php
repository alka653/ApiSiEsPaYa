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

Route::post('/registro', 'Api\AuthController@signup');
Route::post('/ingreso', 'Api\AuthController@login');
Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/salir', 'Api\AuthController@logout');
	Route::get('/user', 'Api\AuthController@user');
	Route::get('/productos', 'Api\ProductsController@list');
	Route::get('/productos/{producto}', 'Api\ProductsController@show');
});
