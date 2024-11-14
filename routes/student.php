<?php

use App\Http\Controllers\Student\CalendarController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\SubjectScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('student.dashboard');
    });

    Route::controller(CalendarController::class)->group(function(){
        Route::get('/kalender-akademik', 'index')->name('student.calendar');
    });
    
    Route::controller(SubjectScheduleController::class)->group(function(){
        Route::get('/jadwal-pelajaran', 'index')->name('student.subjectSchedule');
    });
});
