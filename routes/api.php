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
Route::post('tip', 'API\TipController@index');
Route::post('tip/insert', 'API\TipController@store');
Route::post('tip/update', 'API\TipController@update');
Route::post('tip/show', 'API\TipController@show');
