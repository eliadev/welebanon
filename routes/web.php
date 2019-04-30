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
	// home routes
	Route::get('/', 'HomeController@index')->name('front.home');
	Route::get('/guest/login', 'HomeController@login')->name('front.login');
	Route::post('/guest/doLogin', 'HomeController@doLogin')->name('front.doLogin');
	Route::get('/logout', 'HomeController@logout')->name('front.logout');
	Route::get('/search-results', 'HomeController@search')->name('front.search');
	Route::post('/add-plan', 'HomeController@addPlan')->name('front.addPlan');

	// user route
	Route::get('/my-profile', 'UserController@show')->name('front.profile');

	// services routes
	Route::get('/search-res', 'ServicesController@search')->name('front.search.prov');
	Route::get('/service/{id}', 'ServicesController@show')->name('front.services.show');
	Route::get('/services', 'ServicesController@index')->name('front.services');

	// providers routes
	Route::get('/providers/{id}', 'ProvidersController@show')->name('front.providers.show');
	Route::post('/providers/{id}/book', 'ProvidersController@book')->name('front.providers.book');
	Route::get('/contact', 'ContactController@index')->name('front.contact');
	
});

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('providers', 'ProviderController')->middleware(['has_permission:providers']);
	Route::resource('services', 'ServiceController')->middleware(['has_permission:services']);
	Route::resource('categories', 'CategoryController')->middleware(['has_permission:categories']);
	Route::resource('users', 'UserController')->middleware(['has_permission:users']);
	Route::resource('sliders', 'SliderController')->middleware(['has_permission:sliders']);
	Route::resource('staticPages', 'StaticPageController')->middleware(['has_permission:staticPages']);
	Route::resource('plans', 'PlanController')->middleware(['has_permission:plans']);
	Route::get('clients', 'ClientsController@index')->name('clients.index')->middleware(['has_permission:users']);
	Route::post('clients/{id}/delete', 'ClientsController@destroy')->name('clients.destroy');

	Route::post('providers/media', 'ProviderController@storeMedia')->name('providers.storeMedia');

});