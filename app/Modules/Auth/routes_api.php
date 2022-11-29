<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::withoutMiddleware('auth:sanctum')->group(function () {
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('register', 'RegisterController@register')->name('register');
    });

    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::post('me', 'UserController@me')->name('me');
});
