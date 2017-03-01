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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@show');
Route::get('/profile/edit', 'ProfileController@edit');
Route::post('/profile', 'ProfileController@store');

Route::get('/user/{user}', 'UserController@show');

Route::get('/items', 'ItemsController@index');
Route::get('/items/category/{category}', 'ItemsController@categoryIndex');
Route::get('/items/create', 'ItemsController@create');
Route::get('/items/{item}', 'ItemsController@show');
Route::post('/items', 'ItemsController@store');
Route::post('/items/{item}/delete', 'ItemsController@destroy');
Route::get('/items/{item}/borrow', 'ItemsController@showBorrow');
Route::post('/items/{item}/borrow', 'ItemsController@sendBorrow');

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

