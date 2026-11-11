
<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/petugas', function () {
    return view('petugas');
})->middleware(['auth', 'role:petugas'])
    ->name('petugas.dashboard');


Route::get('/pengelola', function () {
    return 'Dashboard pengelola';
})->middleware(['auth', 'role:pengelola'])->name('pengelola.dashboard');


Route::middleware(['auth', 'role:wisatawan'])->group(function () {
    Route::get('/pesan-tiket', [TicketController::class, 'create'])
        ->name('tickets.create');

    Route::post('/pesan-tiket', [TicketController::class, 'store'])
        ->name('tickets.store');

    Route::get('/riwayat-tiket', [TicketController::class, 'index'])
        ->name('tickets.index');

    Route::get('/riwayat-tiket/{id}', [TicketController::class, 'show'])
        ->name('tickets.show');
});


Route::post('/register/submit', [
    RegistrationController::class,
    'store'
])->middleware('guest')->name('register.store');

Route::get('/register/verify/{id}/{token}', [
    RegistrationController::class,
    'verify'
])->middleware('guest')->name('register.verify');



