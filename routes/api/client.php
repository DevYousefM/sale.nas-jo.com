<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api'], 'prefix' => 'client', 'namespace' => 'Api\Client'], function () {
    Route::post('login', 'AuthController@login');
    Route::get('countries', 'CountryController@all');
    Route::get('country/{id}/cities', 'CountryController@getCitiesByID');
    Route::get('categories', 'CategoryController@all');
    Route::get('sub-categories', 'CategoryController@all_subcategories');
    Route::get('category/{id}/subcategories', 'CategoryController@getSubCategoriesByID');
    Route::get('sub-category/{id}/features', 'CategoryController@getFeaturesBySubCategoryID');

    Route::post('register', 'AuthController@register');
    Route::post('contact-us', 'ContactUsController@store');
    Route::get('about-us', 'AboutUsController@index');
    Route::get('conditions-and-terms', 'TermController@index');

    Route::get('latest-posts', 'PostController@latestPost');
    Route::get('feature-posts', 'PostController@featurePost');
    Route::get('posts', 'PostController@index');
    Route::get('post/{id}/show', 'PostController@show');
    Route::get('post/category/{category_id}/subcategory/{subcategory_id}', 'PostController@getPostByCategoryAndSubcategory');

    Route::get('slider', 'SliderController@index');

    Route::get('push', 'PostController@pushOneSginal');
    Route::get('send-sms', 'AuthController@sendSMS');
    Route::post('verify-account', 'AuthController@verify');
    Route::post('forget-password', 'AuthController@ForgetPassword');
    Route::get('app-setting', 'AppSettingController@index');
    Route::post('logout', function () {
        return "hell";
    })->middleware('auth.guard:client-api');
});

Route::group(['middleware' => ['api', 'auth.guard:client-api'], 'prefix' => 'client', 'namespace' => 'Api\Client'], function () {
    Route::post('account/update', 'AccountController@updateAccount');
    Route::get('post/{id}/add-favorite', 'PostController@postAddFavorite');
    Route::get('post/{id}/remove-favorite', 'PostController@postRemoveFavorite');
    Route::get('posts/favorite', 'PostController@getPostsFavorite');
    Route::get('getProfile', 'AccountController@getProfile');
    Route::get('my-posts', 'PostController@myPosts');
    Route::post('post', 'PostController@store');
    Route::post('posts/nearest', 'PostController@nearestPosts');
    Route::put('post/{id}', 'PostController@update');
    Route::delete('post/{id}', 'PostController@destroy');
    Route::post('order-store', 'ClientPostController@store');
    Route::get('my-orders', 'ClientPostController@index');
    Route::get('notifications', 'NotificationController@index');
    Route::delete('notifications/{id}/delete', 'NotificationController@destroy');
    Route::post('delete-account', 'AuthController@deleteAccount');
});
