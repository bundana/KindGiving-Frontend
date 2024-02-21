<?php

use  App\Http\Controllers\Auth\{Login, PasswordController, SignUp, VerifyAccount};
use Illuminate\Support\Facades\Route;

Route::get('/register',  [SignUp::class, 'index'])->name('register')->middleware('checkIfLoggedIn');
Route::post('/register',  [SignUp::class, 'processRegistration'])->name('register-post')->middleware('checkIfLoggedIn');

Route::get('/verify-account/{token}',  [VerifyAccount::class, 'index'])->name('verify-otp')->middleware('checkIfLoggedIn');
Route::post('/verify-account/{token}',  [VerifyAccount::class, 'processVerification'])->name('verify-otp-post')->middleware('checkIfLoggedIn');
Route::post('/resent-otp/{token}',  [VerifyAccount::class, 'resendOTP'])->name('resend-otp-post')->middleware('checkIfLoggedIn');

Route::get('/login',  [Login::class, 'index'])->name('login')->middleware('checkIfLoggedIn');
Route::post('/login',  [Login::class, 'processLogin'])->name('login-post')->middleware('checkIfLoggedIn');

Route::get('/forget-password',  [PasswordController::class, 'index'])->name('forget-password')->middleware('checkIfLoggedIn');
Route::post('/forget-password',  [PasswordController::class, 'processForgetPassword'])->name('forget-password-post')->middleware('checkIfLoggedIn');

Route::get('/reset-password/{token}',  [PasswordController::class, 'resetPasswordIndex'])->name('reset-password')->middleware('checkIfLoggedIn');

Route::post('/reset-password/{token}',  [PasswordController::class, 'processResetPassword'])->name('reset-password-post')->middleware('checkIfLoggedIn');

Route::get('/verify-email/{token}',  [VerifyAccount::class, 'verifyEmailIndex'])->name('verify-email');
 