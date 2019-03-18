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

// this should be the language selector
Route::get('change-language', function(){
	if(Session::get('applocale') == 'en')
		Session::put('applocale', 'ar');
	else
		Session::put('applocale', 'en');

	return 'language changed to:'.Session::get('applocale');
});


Route::middleware(['language'])->group(function () {
	Route::get('/', 'HomeController@index')->name('front.home');
	Route::get('/services/{id}/', 'HomeController@categories')->name('front.services.show');
	// add all your frontend routes here.
});

//@TODO: rename controllers to plural ex: ServicesController
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('providers', 'ProviderController')->middleware(['has_permission:providers']);
	Route::resource('services', 'ServiceController')->middleware(['has_permission:services']);
	Route::resource('categories', 'CategoryController')->middleware(['has_permission:categories']);
});