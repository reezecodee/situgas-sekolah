<?php

use App\Http\Controllers\Student\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('student.dashboard');
    });
});
