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

//@TODO: rename controllers to plural ex: ServicesController
Route::namespace('Admin')->prefix('admin')->middleware(['auth'])->group(function () {
	Route::get('home', 'HomeController@index')->name('home');
	Route::resource('providers', 'ProviderController');
	Route::resource('services', 'ServiceController');
	Route::resource('categories', 'CategoryController');
});