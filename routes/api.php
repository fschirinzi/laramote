<?php

use Fschirinzi\LaraMote\Http\Controllers\AuthController;
use Fschirinzi\LaraMote\Http\Controllers\ArtisanController;
use Fschirinzi\LaraMote\Http\Controllers\FactoryController;
use Fschirinzi\LaraMote\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;

Route::prefix('laramote')
    ->middleware('LaraMote')
    ->group(function () {

        Route::post('artisan', [ArtisanController::class, 'call']);

        Route::post('auth/login', [AuthController::class, 'login']);

        Route::post('factory', [FactoryController::class, 'call']);

        Route::post('model', [ModelController::class, 'call']);
    });
