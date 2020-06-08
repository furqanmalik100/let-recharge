<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');
Route::get('faqs', 'HomeController@faqs')->name('faqs');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::get('get-countries', 'ServicesController@getCountries')->name('countries');
Route::get('get-services', 'ServicesController@getServices')->name('services');
Route::post('get-operators', 'ServicesController@getOperators')->name('operators');
Route::get('get-products', 'ServicesController@getProducts')->name('products');

Route::get('topup', 'ServicesController@orderPage')->name('topup');

// Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin-dashboard');
    
    Route::get('/cms/about-page', 'Admin\AboutSectionMetaController@index')->name('about-page');
    Route::post('/cms/about-page', 'Admin\AboutSectionMetaController@save')->name('about-page-save');
    Route::resource('/cms/faq', 'Admin\FaqController');
    Route::get('/cms/faq/status-change/{id}', 'Admin\FaqController@statusChange')->name('status-change');
    Route::get('/cms/contact-page', 'Admin\ContactController@index')->name('contact-page');
    Route::post('/cms/contact-page', 'Admin\ContactController@save')->name('contact-page-save');
});