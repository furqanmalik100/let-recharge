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