<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->name('admin.')->namespace('Admin\Auth')->group(function () {
    Route::get('login', 'LoginController@showLoginForm');
    Route::get('register', 'RegisterController@showRegistrationForm');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('register', 'RegisterController@register')->name('register');
});



Route::middleware('auth:admin')->name('admin.')->namespace('Admin')->group(function () {
        Route::get('home', 'HomeController@index')->name('home');
});

