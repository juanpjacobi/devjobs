<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [OfferController::class, 'index'])->middleware(['auth', 'verified', 'recruiter.role'])->name('offers.index');
Route::get('/offers/create', [OfferController::class, 'create'])->middleware(['auth', 'verified'])->name('offers.create');
Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])->middleware(['auth', 'verified'])->name('offers.edit');
Route::get('/offers/{offer}', [OfferController::class, 'show'])->name('offers.show');
Route::get('/candidates/{offer}', [CandidateController::class, 'index'])->name('candidates.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//notifications
Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'recruiter.role'])->name('notifications');



require __DIR__.'/auth.php';
