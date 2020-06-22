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
Route::get('/redirect', 'HomeController@redirect')->name('redirect');
Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');
Route::get('faqs', 'HomeController@faqs')->name('faqs');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::group(['prefix' => 'all-services'], function(){
    Route::get('/', 'ServicesController@index')->name('services');
    Route::get('/show-summary', 'ServicesController@showSummary')->name('services.show-summary');
    Route::get('/payment-complete', 'ServicesController@showDone')->name('services.show-done');

    Route::post('country-services', 'ServicesController@countryServices')->name('country.services');
    Route::post('service-operators', 'ServicesController@serviceOperators')->name('service.operators');
    Route::post('operator-products', 'ServicesController@operatorProducts')->name('operator.products');

    Route::post('save-order-details', 'ServicesController@saveOrderDetails')->name('save.service-order.details');
    Route::post('save-order-payment', 'ServicesController@saveOrderPayment')->name('save.service-order.payment');
});

Route::group(['prefix' => 'mobile-topup'], function(){
    Route::get('/', 'AirtimeController@index')->name('airtime');
    Route::get('/show-summary', 'AirtimeController@showSummary')->name('airtime.show-summary');
    Route::get('/payment-complete', 'AirtimeController@showDone')->name('airtime.show-done');
    
    Route::post('get-products', 'AirtimeController@getProducts')->name('airtime.products');
    Route::post('save-order-details', 'AirtimeController@saveOrderDetails')->name('save.airtime-order.details');
    Route::post('save-order-payment', 'AirtimeController@saveOrderPayment')->name('save.airtime-order.payment');
});

// Admin Routes
Route::get('admin/login', 'Admin\AdminLoginController@showLoginForm')->name('admin-login');
Route::post('admin/login', 'Admin\AdminLoginController@login')->name('admin-login-post');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin-dashboard');
    
    Route::get('/cms/home-page', 'Admin\HomeSectionMetaController@index')->name('home-page');
    Route::post('/cms/home-page', 'Admin\HomeSectionMetaController@save')->name('home-page-save');

    Route::get('/cms/about-page', 'Admin\AboutSectionMetaController@index')->name('about-page');
    Route::post('/cms/about-page', 'Admin\AboutSectionMetaController@save')->name('about-page-save');

    Route::resource('/cms/faq', 'Admin\FaqController');
    Route::get('/cms/faq/status-change/{id}', 'Admin\FaqController@statusChange')->name('status-change');

    Route::get('/cms/contact-page', 'Admin\ContactController@index')->name('contact-page');
    Route::post('/cms/contact-page', 'Admin\ContactController@save')->name('contact-page-save');

    Route::get('/cms/social-links', 'Admin\SocialLinksMetaController@index')->name('social-links');
    Route::post('/cms/social-links', 'Admin\SocialLinksMetaController@save')->name('social-links-save');

    Route::get('customers', 'Admin\DashboardController@customers')->name('customer.list');
    Route::get('transactions/{cid?}', 'Admin\DashboardController@transactions')->name('transaction.list');

    Route::group(['prefix' => 'promo'], function(){
        Route::get('list', 'Admin\PromoController@index')->name('promo.list');
        Route::get('add', 'Admin\PromoController@add')->name('promo.add');
        Route::get('edit/{id}', 'Admin\PromoController@edit')->name('promo.edit');
        Route::get('delete/{id}', 'Admin\PromoController@delete')->name('promo.delete');
        Route::get('change-status/{id}/{status}', 'Admin\PromoController@changeStatus')->name('promo.change-status');
        Route::post('save/{id?}', 'Admin\PromoController@save')->name('promo.save');

        Route::post('get-operators', 'Admin\PromoController@getOperators')->name('promo.operators');
    });

    
    Route::get('/settings', 'Admin\GeneralSettingsController@index')->name('admin.settings');
    Route::post('/settings', 'Admin\GeneralSettingsController@store')->name('admin.settings.save');
});

Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
    Route::get('/dashboard', 'UserController@index')->name('user.dashboard');
    Route::get('/profile-setting', 'UserController@profile')->name('user.profile');

    Route::post('update-email', 'UserController@updateEmail')->name('update.email');
    Route::post('update-password', 'UserController@updatePassword')->name('update.password');
    Route::post('update-personal-info', 'UserController@updatePersonalInfo')->name('update.personal_info');

    Route::get('repeat-service/{id}', 'UserController@repeatService')->name('repeat.service');
    Route::get('repeat-airtime/{id}', 'UserController@repeatAirtime')->name('repeat.airtime');
    
    Route::get('/profile', 'Admin\AdminProfileController@index')->name('admin-profile');
    Route::post('/profile', 'Admin\AdminProfileController@store')->name('admin-profile-save');
});