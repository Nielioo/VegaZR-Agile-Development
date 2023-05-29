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
    return redirect()->route('login');
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
    Route::get('/umkm/addumkm', function(){
        return view('umkm.addumkm');
    })->name('umkm.addumkm');

    Route::get('/umkm', [App\Http\Controllers\UMKMController::class, 'index'])->name('umkm');
    Route::get('/umkm/show', [App\Http\Controllers\UMKMController::class, 'show'])->name('umkm.show');
    Route::post('/umkm/store', [App\Http\Controllers\UMKMController::class, 'store'])->name('umkm.store');

    // Event
    Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('event');
    Route::post('/events/create', [App\Http\Controllers\EventController::class, 'store'])->name('event.create');
    Route::get('/events/addevent', function(){
        return view('events.addevent');
    })->name('event.addevent');
    Route::get('/events/{id}/show', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');
    Route::get('/events/{id}/destroy', [App\Http\Controllers\EventController::class, 'destroy'])->name('event.destroy');

    // Booking
    Route::get('/booking/{id}', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/{id}/store', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{id}/create', [App\Http\Controllers\BookingController::class, 'create'])->name('event_addBooking');
    Route::get('/booking/{id}/update', [App\Http\Controllers\BookingController::class, 'update'])->name('booking.update');
    Route::get('/booking-canceled/{id}', [App\Http\Controllers\BookingController::class, 'bookingCanceledIndex'])->name('booking_canceled');
    Route::get('/booking/destroy/{id}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('booking.destroy');
});
