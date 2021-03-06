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
//Route::resource('photos', 'PhotoController', ['only' => ['index', 'store']]);
Route::post('authenticate', 'Api\\AuthenticateController@authenticate');
Route::post('register', 'Api\\AuthenticateController@register');
Route::group(['middleware' => ['jwt.auth']], function () {
    Route::resource('photos', 'PhotoController');
});

