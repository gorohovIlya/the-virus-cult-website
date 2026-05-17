<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Reviews Routes
|--------------------------------------------------------------------------
*/

// Публичные маршруты (доступны всем)
Route::get('/feedback', [ReviewController::class, 'index'])->name('feedback');

// Маршруты требующие авторизации
Route::middleware(['auth'])->group(function () {
    Route::post('/feedback', [ReviewController::class, 'store'])->name('feedback.store');
});
