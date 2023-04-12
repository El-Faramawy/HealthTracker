<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'/*, 'namespace' => 'User'*/], function () {



    Route::group(['middleware' => 'all_guards:user_api'], function () {
        Route::get('profile', 'AuthController@profile');
        Route::post('update_profile', 'AuthController@update_profile');
        Route::post('logout', 'AuthController@logout');
        Route::post('deleteAccount', 'AuthController@deleteAccount');

        /* ---------------------- order -------------------*/
        Route::get('brands','OrderController@brands');
        Route::get('parts','OrderController@parts');
        Route::post('store_order', 'OrderController@store_order');
        Route::post('update_order', 'OrderController@update_order');
        Route::get('current_orders', 'OrderController@current_orders');
        Route::get('previous_orders', 'OrderController@previous_orders');

        /* ---------------------- notifications -------------------*/
        Route::get('notifications', 'NotificationController@notifications');
        Route::get('getNotificationsCount', 'NotificationController@getNotificationsCount');

        /* ---------------------- contact -------------------*/
        Route::post('contact_with_user','ContactController@contact_with_user');




    });
});
