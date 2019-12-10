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

use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/admin/admin-login', 'AdminsController@login'); //???

Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/user/create', 'UsersController@create');
Route::post('/admin/user/create', 'UsersController@store');
Route::get('/admin/user/edit/{id}', 'UsersController@edit');
Route::put('/admin/user/edit/{id}', 'UsersController@update');
Route::delete('/admin/user/{id}', 'UsersController@destroy');
Route::get('/admin/klasses', 'KlassesController@index');
Route::get('/admin/klass/create', 'KlassesController@create');
Route::post('/admin/klass/create', 'KlassesController@store');
Route::get('/admin/klass/edit/{id}', 'KlassesController@edit');
Route::put('/admin/klass/edit/{id}', 'KlassesController@update');
Route::delete('/admin/klass/{id}', 'KlassesController@destroy');

Route::get('/{username}', 'UsersController@overview');
Route::get('/{username}/homework', 'UsersController@homework');
Route::get('/{username}/messages', 'UsersController@messages');

Route::post('/', 'UsersController@login');

