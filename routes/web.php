<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('welcome');

    // ****************** contact *****************************
    Route::view('contact', 'Web.contact')->name('contact');
    Route::post('post_contact_us', 'ContactController@post_contact_us')->name('post_contact_us');

    Route::view('about', 'Web.about')->name('about');
    Route::get('doctors', 'DoctorController@index')->name('doctors');
    Route::get('doctor_profile/{id}', 'DoctorController@doctor_profile')->name('doctor_profile');
    Route::view('patient_profile/{id}','Web.patient_profile')->name('patient_profile');
//    Route::get('hospitals', 'HospitalController@index')->name('hospitals');
    Route::view('hospitals', 'Web.hospitals')->name('hospitals');

    Route::get('reservation', 'ReservationController@index')->name('reservation');
    Route::post('store_reservation', 'ReservationController@store_reservation')->name('store_reservation');
    Route::view('my-appointments', 'Web.my-appointments')->name('my-appointments');

    Route::get('login', 'AuthController@login')->name('login');
    Route::post('user_login', 'AuthController@user_login')->name('user_login');
    Route::get('register', 'AuthController@register')->name('register');
    Route::post('user_register', 'AuthController@user_register')->name('user_register');
    Route::post('doctor_register', 'AuthController@doctor_register')->name('doctor_register');
    Route::get('logout', 'AuthController@logout')->name('logout');

});

// ****************** web view *****************************
Route::get('terms', 'WebView\TermsController@terms')->name('terms');
Route::get('privacy', 'WebView\TermsController@privacy')->name('privacy');

