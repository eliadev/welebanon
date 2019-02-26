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
    return view('service');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//@TODO: rename controllers to plural ex: ServicesController
Route::namespace('Admin')->prefix('admin')->group(function () {
	Route::resource('services', 'ServiceController');
	Route::resource('categories', 'CategoryController');
});