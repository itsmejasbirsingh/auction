<?php

use App\Http\Controllers\AuctionsController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuctionsController::class, 'index'])->name('dashboard');
    Route::post('/bid', [AuctionsController::class, 'bid'])->name('bid.save');
    Route::get('/bid', [AuctionsController::class, 'show'])->name('bid.show');
});

Route::post('/forgot-password', [PasswordResetLinkController::class, 'forgot'])->middleware('guest')->name('password.email');

Route::middleware(['admin'])->group(function () {
    Route::get('/auction/add', [AuctionsController::class, 'create'])->name('auction.add');
    Route::post('/auctions', [AuctionsController::class, 'save'])->name('auction.save');
});

require __DIR__ . '/auth.php';