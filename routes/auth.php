<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware('guest')->group(function(){
    Route::get('login', Login::class)->name('login');
});

Route::post('auth/logout', LogoutController::class)->name('logout');
