<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DownloadController;


Route::get('/', function () {
    return view('main');
})->name('main-page');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/register/success');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register/success', function() {
    return view('main');
})->middleware(['auth', 'verified'])->name('register/success');

Route::get('/personal-account', function() {
    return view('auth.personal-account');
})->name('personal-account');

Route::get('/about-us', function() {
    return view('about_us');
})->name('about-us');

Route::get('/our-plans', function() {
    return view('plans');
})->name('our-plans');

Route::get('/download', function() {
    return view('download');
})->name('download');

Route::get('/feedback', function() {
    return view('feedback');
})->name('feedback');

Route::get('/support-us', function() {
    return view('support_us');
})->name('support-us');

require __DIR__ . '/reviews.php';

Route::get('/support-us/donate', function() {
    return redirect('https://www.donationalerts.com/r/theviruscultproject');
})->name('donationalerts');


