<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();



Route::resource('admin/photo', 'Admin\\PhotoController');
Route::resource('permissions', 'Admin\\PermissionController');
Route::resource('roles', 'Admin\\RoleController');
Route::resource('users', 'Admin\\UserController');
Route::get('image-upload','Admin\\ImageController@imageUpload');
Route::post('image-upload','Admin\\ImageController@imageUploadPost');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('photo', 'User\\PhotoUserController');

