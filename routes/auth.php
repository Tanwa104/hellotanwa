<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\HelpAddController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register.get');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.build');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.build');
    Route::get('signup', [SignupController::class, 'create'])
    ->name('signup');

    Route::get('/addmin-log', [AdminController::class, 'index'])->name('admin.log');
    Route::get('/addmin-seen', [AdminController::class, 'create'])->name('admin.seen');
Route::post('signup', [SignupController::class, 'store'])->name('signup.build');

Route::get('signin', [SigninController::class, 'create'])
                ->name('signin');

    Route::post('signin', [SigninController::class, 'store'])->name('signin.build');
    Route::get('helpadd', [HelpAddController::class, 'create'])
                ->name('helpadd');

                Route::post('helpadd', [HelpAddController::class, 'store'])->name('helpadd.build');
                Route::post('helpotp', [HelpAddController::class, 'lema'])->name('helpotp.seen');



    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
