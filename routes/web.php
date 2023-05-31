<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\ParticipantsController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\Admin\SpeakersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Site\MessagesController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

/**
 * SITE
 */
Route::get('/', function () {
    return view('site');
})->name('site.index');

Route::get('/eventos', [SiteController::class, 'events'])->name('site.eventos');
Route::get('/palestrantes', [SiteController::class, 'speakers'])->name('site.palestrantes');
Route::post('/participar-evento', [SiteController::class, 'storeParticipant'])->name('site.participar-evento');
Route::post('/messages', [MessagesController::class, 'store']);

Route::get('/contato', function () {
    return view('layouts.frontend.contact');
})->name('site.contato');

/**
 * ADMIN
 */
Route::middleware('auth')->group(function () {
    Route::resource('/users', UsersController::class);
    Route::resource('/rooms', RoomsController::class);
    Route::resource('/events', EventsController::class);
    Route::resource('/speakers', SpeakersController::class);
    Route::resource('/participants', ParticipantsController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/dashboard', [DashboardController::class, 'search'])->name('admin.search');
    Route::resource('/messages', MessagesController::class);
    // Callendar
    Route::get('/list-events', [DashboardController::class, 'listEventsCalendar'])->name('admin.list-events-calendar');
});




