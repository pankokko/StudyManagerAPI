<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:web')->name('user.')->namespace('Auth')->group(function () {
    Route::get('show_mypage', 'UserController@showMyPage')->name('mypage');
    Route::get('register_form', 'UserController@showRegisterForm')->name('register_form');
    Route::post('register_data', 'UserController@registerData')->name('register_data');
    Route::get('mypage_meditation', 'UserController@showMypageMeditation')->name('mypage_meditation');
    Route::get('mypage_study', 'UserController@showMypageStudy')->name('mypage_study');

    Route::name('meditation.')->prefix('meditation')->group(function(){
        Route::post('save_record', 'MeditationController@saveRecord')->name('save_record');
    });
});
