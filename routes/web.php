<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\PaymentsController;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('apartments', ApartmentController::class)->parameters(['apartments' => 'apartment:slug']);

    Route::get('/payment/make', [PaymentsController::class, 'make'])->name('payment.make');
    Route::get('/payment', function () {
        return view('payment.payment');
    })->name('check');
});


require __DIR__ . '/auth.php';
