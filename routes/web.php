<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::controller(MainController::class)
    ->name('app.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('profile', 'profile')->name('profile');
        Route::post('settings', 'settingStore')->name('settings.store');
        Route::post('minimize', 'minimizeWindow')->name('minimizeWindow');
        Route::post('close', 'closeWindow')->name('closeWindow');
});