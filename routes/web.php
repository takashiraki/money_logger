<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\PasswordResetRequestController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Category\CreateCategoryController;
use App\Http\Controllers\record\CreateRecordController;
use App\Http\Controllers\Record\ListController;
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

Route::middleware('guest')->group(function () {
    Route::get('/sign-up', [SignUpController::class, 'index']);

    Route::post('/sign-up', [SignUpController::class, 'handle']);

    Route::get('/sign-in', [SignInController::class, 'index'])->name('login');

    Route::post('/sign-in', [SignInController::class, 'authenticate']);

    Route::get('/password-reset-request', [PasswordResetRequestController::class, 'index']);

    Route::post('/password-reset-request', [PasswordResetRequestController::class, 'handle']);

    Route::get('/password-reset/{reset_id}/index', [PasswordResetController::class, 'index']);

    Route::post('/password-reset/apdate', [PasswordResetController::class, 'handle']);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('contents.home');
    })->middleware('auth', 'verified')->name('home');

    Route::get('/category/create', [CreateCategoryController::class, 'index']);

    Route::post('/category/store', [CreateCategoryController::class, 'handle']);

    Route::get('/record/create', [CreateRecordController::class, 'index']);

    Route::post('/record/store', [CreateRecordController::class, 'handle']);

    Route::get('/record/list', [ListController::class, 'index']);
});
