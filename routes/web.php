<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\MessageController;
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
    return redirect()->route('dashboard');
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
    Route::get('/payment/{apartment}/{sponsorship}', [PaymentsController::class, 'index'])->name('check');
    Route::get('/sponsorship/{apartment:slug}', [SponsorshipController::class, 'index'])->name('sponsorship.index');
    Route::get('/sponsorship/{apartment:slug}/{sponsorship}', [SponsorshipController::class, 'store'])->name('sponsorship.store');

    Route::get('/messages', [MessageController::class, 'index'])->name('message.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('message.show');
    Route::patch('apartments/{apartment}/toggle', [ApartmentController::class, 'enableToggle'])->name('apartment.toggle');
});




require __DIR__ . '/auth.php';
