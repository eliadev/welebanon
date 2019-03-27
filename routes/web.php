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

Auth::routes();

Route::get('change-language/{lang}', 'LanguageController@index')->name('change-language');

Route::middleware(['language'])->group(function () {
	Route::get('/', 'HomeController@index')->name('front.home');
	Route::get('/services/{id}', 'ServicesController@show')->name('front.services.show');
	Route::get('/providers/{id}/', 'ProvidersController@show')->name('front.providers.show');
});

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('providers', 'ProviderController')->middleware(['has_permission:providers']);
	Route::resource('services', 'ServiceController')->middleware(['has_permission:services']);
	Route::resource('categories', 'CategoryController')->middleware(['has_permission:categories']);
});