<?php

use App\Http\Controllers\ProcessReviewController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::controller(ReviewController::class)->group(function() 
{
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{reviewId}', 'show');
    Route::post('/', 'store');
});

//Route::get('/{reviewId}/process', ProcessReviewController::class);