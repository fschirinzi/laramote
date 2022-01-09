<?php

use Fschirinzi\LaraMote\Http\Controllers\AuthController;
use Fschirinzi\LaraMote\Http\Controllers\ArtisanController;
use Fschirinzi\LaraMote\Http\Controllers\FactoryController;
use Fschirinzi\LaraMote\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;

Route::prefix('laramote')
    ->middleware('LaraMote')
    ->group(function () {

        Route::post('artisan', [ArtisanController::class, 'call'])->name('laramote.artisan');

        Route::post('auth/login', [AuthController::class, 'login'])->name('laramote.login');

        Route::post('factory', [FactoryController::class, 'call'])->name('laramote.factory');

        Route::post('model', [ModelController::class, 'call'])->name('laramote.model');
    });
