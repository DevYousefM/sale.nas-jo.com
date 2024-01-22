<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin' ,'middleware'=>'guest:admin' ,'namespace'=>'Admin'] , function(){
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::group(['prefix' => 'admin' ,'middleware'=>'auth:admin' ,'namespace'=>'Admin'] , function(){
        Route::get('/','DashboardController@index')->name('admin.dashboard');
        Route::get('/logout','LoginController@logout')->name('admin.logout');
        Route::resource('modals','ModalsController');
        Route::resource('category','CategoryController');
        Route::resource('sub-category','SubCategoryController');
        Route::resource('country','CountryController');
        Route::resource('city','CityController');
        Route::get('notification','NotificationController@index')->name('admin.notification');
        Route::get('nav_notifications','NotificationController@nav_notifications')->name('admin.nav_notifications');
        Route::delete('notification/{id}','NotificationController@destroy')->name('admin.notification.delete');
        Route::resource('client','ClientController');
        Route::resource('sub-admin','AdminController');
        Route::resource('feature','FeatureController');
        Route::resource('post','PostController');
        Route::post('ajax-post-refusal','PostController@postRefusal')->name('admin.post-refusal');
        Route::resource('slider','SliderController')->except(['show','edit','update']);
        Route::get('term','TermController@index')->name('get_term');
        Route::post('term','TermController@update')->name('post_term');
        Route::get('policy','PrivacyPolicyController@index')->name('get_policy');
        Route::post('policy','PrivacyPolicyController@update')->name('post_policy');

        Route::get('about-us','AboutUsController@index')->name('get_about_us');
        Route::post('about-us','AboutUsController@update')->name('post_about_us');

        Route::get('website/setting','WebSiteSettingController@index')->name('get_website_setting');
        Route::post('website/setting','WebSiteSettingController@update')->name('post_website_setting');


        Route::post('sub-category/features','AjaxController@getFeatures')->name('sub_categories_get_features');
        Route::post('post-change-feature','AjaxController@changeFeatureStatus')->name('feature_post');
        Route::post('post-change-status','AjaxController@changeStatus')->name('status_post');
        Route::post('post-change-slider-status','AjaxController@changeSliderStatus')->name('status_slider');
        Route::resource('contact-us', 'ContactUsController')->except(['show','edit','update','create']);


        Route::get('app-setting','AppSettingController@index')->name('get_app_setting');
        Route::post('app-setting','AppSettingController@post')->name('post_app_setting');
        Route::post('ajax-update-player_id','AdminController@updatePlayerId')->name('admin.updaye_player_id');
    });
});
