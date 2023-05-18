<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // UMKM
    Route::get('/umkm', [App\Http\Controllers\UMKMController::class, 'index'])->name('umkm');
    Route::get('/umkm/show', [App\Http\Controllers\UMKMController::class, 'show'])->name('umkm.show');

    // Event
    Route::get('/events/', [App\Http\Controllers\EventController::class, 'index'])->name('event');
    Route::post('/events/create', [App\Http\Controllers\EventController::class, 'store'])->name('event.create');
    Route::get('/events/addevent', function(){
        return view('events.addevent');
    })->name('event.addevent');
    Route::get('/events/{id}/show', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');

    // Booking
    Route::get('/booking/{id}', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
});
