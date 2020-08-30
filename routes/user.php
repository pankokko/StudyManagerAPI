<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:user')->name('user.')->namespace('Auth')->group(function () {
    Route::get('show_mypage', 'UserController@showMyPage')->name('mypage');
    Route::get('register_form', 'UserController@showRegisterForm')->name('register_form');
    Route::post('register_data', 'UserController@registerData')->name('register_data');
    Route::get('mypage_meditation', 'UserController@showMypageMeditation')->name('mypage_meditation');

    //瞑想関連
    Route::name('meditation.')->prefix('meditation')->group(function () {
        Route::post('save_record', 'MeditationController@saveRecord')->name('save_record');
    });

    //勉強ページ
    Route::name('study.')->prefix('study')->group(function () {
        Route::get('{id}/show', 'StudyController@showRecord')->name('show');
        Route::get('{id}/edit', 'StudyController@editRecord')->name('edit');
        Route::get('{id}/delet', 'StudyController@deleteRecord')->name('delete');
        Route::post('create_record', 'StudyController@createRecord')->name('create_record');
        Route::get('mypage_study', 'StudyController@showMypageStudy')->name('mypage_study');
        Route::get('register_record', 'StudyController@showRegisterForm')->name('register_form');
        Route::get('study_axios', 'StudyController@getStudyAxios');
        Route::get('all_records', 'StudyController@showAllRecords')->name('all_records');
        Route::post('{id}/delete', 'StudyController@deleteRecord')->name('delete_Record');
    });

    Route::name('weekly_target.')->prefix('weekly_target')->namespace('WeeklyTarget')->group( function() {
        Route::post('set_target', 'WeeklyTargetController@setTargetTime')->name('set_target');
    });
});
