<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/**
 * SITE
 */
Route::get('/', function () {
    return view('site');
})->name('site.index');
Route::get('/events', function () {
    return view('layouts.frontend.events');
})->name('site.events');
Route::get('/speakers', function () {
    return view('layouts.frontend.speakers');
})->name('site.speakers');
Route::get('/contact', function () {
    return view('layouts.frontend.contact');
})->name('site.contact');

/**
 * ADMIN
 */
Route::middleware('auth')->group(function () {
    Route::resource('/users', UsersController::class);
    Route::resource('/post', PostsController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});




