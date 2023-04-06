<?php

use App\Http\Controllers\AuctionsController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\UsersController;
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

Route::middleware(['auth', 'verifiedUser'])->group(function () {
    Route::get('/', [AuctionsController::class, 'index'])->name('dashboard');
    Route::get('/live-auction', [AuctionsController::class, 'auctions'])->name('auctions');
    Route::post('/bid', [AuctionsController::class, 'bid'])->name('bid.save');
    Route::get('/bid', [AuctionsController::class, 'show'])->name('bid.show');
    Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
});

Route::post('/forgot-password', [PasswordResetLinkController::class, 'forgot'])->middleware('guest')->name('password.email');

Route::middleware(['admin'])->group(function () {
    Route::get('/auction/{id}/biddings', [AuctionsController::class, 'biddings'])->name('auction.biddings');
    Route::get('/auction/add', [AuctionsController::class, 'create'])->name('auction.add');
    Route::post('/auctions', [AuctionsController::class, 'save'])->name('auction.save');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/{id}', [UsersController::class, 'detail'])->name('users.detail');
    Route::post('/users/{id}/verification/{status}', [UsersController::class, 'verification'])->name('users.verification');
    Route::post('/auctions/csv', [AuctionsController::class , 'uploadCsv'])->name('auction.save.csv');
    Route::post('/auction/{id}/extendClosingDate', [AuctionsController::class , 'extendClosingDate'])->name('auction.extendClosingDate');
});

require __DIR__ . '/auth.php';