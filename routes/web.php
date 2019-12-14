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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/admin/login', 'AdminsController@index');
Route::post('/admin/login', 'AdminsController@login');

Route::resources([
    'users' => 'UsersController',
    'students' => 'UsersController',
    'klasses' => 'UsersController'
]);

Route::get('/user', 'UsersController@overview');
Route::get('/user/homework', 'UsersController@homework');
Route::get('/user/showHomework/{date}', 'UsersController@showHomework');
Route::post('/user/homework', 'UsersController@submitHomework');
Route::get('/test', 'UsersController@test');

Route::get('/user/messages', 'UsersController@messages');


Route::post('/', 'UsersController@login');

