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

// this should be the language selector
Route::get('change-language', function(){
	if(Session::get('applocale') == 'en')
		Session::put('applocale', 'ar');
	else
		Session::put('applocale', 'en');

	return 'language changed to:'.Session::get('applocale');
});


Route::middleware(['language'])->group(function () {
	Route::get('/home', 'HomeController@index');
	Route::get('/service/{id}/', 'HomeController@categories')->name('service');
	// add all your frontend routes here.
});

//@TODO: rename controllers to plural ex: ServicesController
Route::namespace('Admin')->prefix('admin')->middleware(['auth'])->group(function () {
	Route::get('home', 'HomeController@index')->name('home');
	Route::resource('providers', 'ProviderController');
	Route::resource('services', 'ServiceController');
	Route::resource('categories', 'CategoryController');
});