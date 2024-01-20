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

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::get('/', 'HomeController@index')->name('website');
    Route::get('/post/{id}/details', 'HomeController@show')->name('website.post.show');
    Route::get('/posts/search', 'HomeController@search')->name('website.posts.search');
    Route::post('country/get-cities','Admin\AjaxController@getCities')->name('country_get_cities');
    Route::post('category/get-sub-categories','Admin\AjaxController@getSubCategories')->name('country_get_sub_categories');
    Route::get('policy','HomeController@policy')->name('website.policy');
    Route::get('TermsAndConditions','HomeController@TermsAndConditions')->name('website.TermsAndConditions');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
