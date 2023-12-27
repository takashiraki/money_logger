<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\PasswordResetRequestController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\SignUpController;
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

Route::get('/sign-up', [SignUpController::class, 'index']);

Route::post('/sign-up', [SignUpController::class, 'handle']);

Route::get('/sign-in', [SignInController::class, 'index']);

Route::post('/sign-in', [SignInController::class, 'authenticate']);

Route::get('/password-reset-request', [PasswordResetRequestController::class, 'index']);

Route::post('/password-reset-request', [PasswordResetRequestController::class, 'handle']);

Route::get('/password-reset/{reset_id}/index', [PasswordResetController::class, 'index']);

Route::get('/home', function () {
    return view('contents.home');
});
