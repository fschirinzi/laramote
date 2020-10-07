<?php

use Fschirinzi\LaraMote\Http\Controllers\AuthController;
use Fschirinzi\LaraMote\Http\Controllers\ArtisanController;
use Fschirinzi\LaraMote\Http\Controllers\FactoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('laramote')
    ->middleware('LaraMote')
    ->group(function () {

        Route::post('artisan/call', [ArtisanController::class, 'call']);

        Route::post('auth/login', [AuthController::class, 'login']);

        Route::post('factory', [FactoryController::class, 'call']);
    });
