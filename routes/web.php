<?php

use Illuminate\Support\Facades\Route;
use Larsklopstra\Nebula\Http\Controllers\DashboardController;
use Larsklopstra\Nebula\Http\Controllers\ResourceController;
use Larsklopstra\Nebula\Http\Controllers\StartController;

Route::get('/', StartController::class)->name('start');

Route::get('/dashboards/{dashboard}', [DashboardController::class, 'index'])->name('dashboards.index');

Route::name('resources.')->prefix('/resources')->group(function () {
    Route::get('/{resource}', [ResourceController::class, 'index'])->name('index');
    Route::get('/{resource}/create', [ResourceController::class, 'create'])->name('create');
    Route::post('/{resource}/create', [ResourceController::class, 'store'])->name('store');

    Route::get('/{resource}/{model}/edit', [ResourceController::class, 'edit'])->name('edit');
    Route::patch('/{resource}/{model}/edit', [ResourceController::class, 'update'])->name('update');

    Route::get('/{resource}/{model}', [ResourceController::class, 'show'])->name('show');

    Route::delete('/{resource}/{model}', [ResourceController::class, 'destroy'])->name('destroy');
});
