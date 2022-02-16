<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('app')->as('app:')->group(function () {
    Route::prefix('posts')->as('posts:')->group(function () {
        Route::get('/', App\Http\Controllers\Web\Backend\Posts\IndexController::class)->name('index');
        Route::get('create', App\Http\Controllers\Web\Backend\Posts\CreateController::class)->name('create');
        Route::post('create', App\Http\Controllers\Web\Backend\Posts\StoreController::class)->name('store');
        Route::get('{post:slug}', App\Http\Controllers\Web\Backend\Posts\ShowController::class)->name('show');
        Route::patch('{post:slug}', App\Http\Controllers\Web\Backend\Posts\UpdateController::class)->name('update');
    });
});
