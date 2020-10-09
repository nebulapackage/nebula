<?php

use Illuminate\Support\Facades\Route;
use Larsklopstra\Nebula\Http\Controllers\DashboardController;
use Larsklopstra\Nebula\Http\Controllers\PageController;
use Larsklopstra\Nebula\Http\Controllers\ResourceController;
use Larsklopstra\Nebula\Http\Controllers\StartController;

$routePrefix = config('nebula.prefix');

Route::get("/$routePrefix", StartController::class)->name('start');

Route::get('/dashboards/{dashboard}', [DashboardController::class, 'index'])->name('dashboards.index');

Route::name('resources.')->prefix('/resources')->group(function () {
    Route::get('/{resource}', [ResourceController::class, 'index'])->name('index');
    Route::get('/{resource}/create', [ResourceController::class, 'create'])->name('create');
    Route::post('/{resource}/create', [ResourceController::class, 'store'])->name('store');

    Route::get('/{resource}/{item}/edit', [ResourceController::class, 'edit'])->name('edit');
    Route::patch('/{resource}/{item}/edit', [ResourceController::class, 'update'])->name('update');

    Route::get('/{resource}/{item}', [ResourceController::class, 'show'])->name('show');

    Route::delete('/{resource}/{item}', [ResourceController::class, 'destroy'])->name('destroy');
});

Route::get('/page/{page}', [PageController::class, 'index'])->name('pages.index');
