<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:user')->name('user.')->namespace('Auth')->group(function () {
    Route::get('show_mypage', 'UserController@showMyPage')->name('mypage');
    Route::get('register_form', 'UserController@showRegisterForm')->name('register_form');
    Route::post('register_data', 'UserController@registerData')->name('register_data');
    Route::get('mypage_meditation', 'UserController@showMypageMeditation')->name('mypage_meditation');

    Route::name('meditation.')->prefix('meditation')->group(function(){
        Route::post('save_record', 'MeditationController@saveRecord')->name('save_record');
    });

    Route::name('study.')->prefix('study')->group(function() {
       Route::post('create_record', 'StudyController@createRecord')->name('create_record');
        Route::get('mypage_study', 'StudyController@showMypageStudy')->name('mypage_study');
        Route::get('study_axios', 'StudyController@getStudyAxios');
    });
});
