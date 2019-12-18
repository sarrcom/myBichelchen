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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

// Front Office
Route::get('/', function () {
    return view('landing-page');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cookies', function () {
    return view('cookies');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/support', function () {
    return view('support');
});

// Admin
Route::get('/admin/login', 'AdminsController@index');
Route::post('/admin/login', 'AdminsController@login');

Route::resources([
    'users' => 'UsersController',
    'students' => 'StudentsController',
    'klasses' => 'KlassesController'
]);

// Users
Route::post('/', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');

Route::get('/user', 'UsersController@overview');

Route::get('/user/homework/{date?}', 'UsersController@homework');
Route::post('/user/homework', 'UsersController@submitHomework');


Route::get('/user/messages/{id?}', 'UsersController@messages');
Route::post('/user/messages', 'UsersController@sendMessages');


Route::get('/user/absences/{id?}', 'UsersController@absences');
Route::post('/user/absences', 'UsersController@sendAbsences');

Route::get('/test/{id}', 'UsersController@test');
