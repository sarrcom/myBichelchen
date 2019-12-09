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
    return view('welcome');
});

Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/user/create', 'UsersController@create');
Route::get('/admin/user/edit/{id}', 'UsersController@edit');
Route::get('/admin/klasses', 'KlassesController@index');
Route::get('/admin/klass/create', 'KlassesController@create');
Route::get('/admin/klass/edit/{id}', 'KlassesController@edit');

Route::get('/{username}', 'UsersController@overview');
Route::get('/{username}/homework', 'UsersController@homework');
Route::get('/{username}/messages', 'UsersController@messages');
