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

Route::get('/profile', 'ProfileController@show');
Route::get('/profile/edit', 'ProfileController@edit');

Route::get('/items', 'ItemsController@index');
Route::get('/items/create', 'ItemsController@create');
Route::get('/items/{item}', 'ItemsController@show');
Route::post('/items', 'ItemsController@store');
Route::post('/items/{item}/delete', 'ItemsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index');
