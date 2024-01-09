<?php

use App\Livewire\Dashboard;
use App\Livewire\ForgotPassword;
use App\Livewire\Login;
use App\Livewire\PasswordReset;
use App\Livewire\Register;
use App\Livewire\UserProfile;
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
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', PasswordReset::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', Dashboard::class)->name('home');
    Route::get('/profile', UserProfile::class)->name('profile');
});
