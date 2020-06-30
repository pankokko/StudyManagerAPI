<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:web')->name('user.')->namespace('Auth')->group(function() {
   Route::get('register_form', 'UserController@showRegisterForm')->name('register_form');
   Route::post('register_data', 'UserController@registerData')->name('register_data');
});

?>
