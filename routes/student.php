<?php

use App\Http\Controllers\Student\CalendarController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\MyClassController;
use App\Http\Controllers\Student\SubjectScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('student.dashboard');
    });

    Route::prefix('akademik')->group(function () {
        Route::controller(CalendarController::class)->group(function () {
            Route::get('/kalender-akademik', 'index')->name('student.calendar');
        });

        Route::controller(SubjectScheduleController::class)->group(function () {
            Route::get('/jadwal-pelajaran', 'index')->name('student.subjectSchedule');
        });

        Route::controller(MyClassController::class)->group(function () {
            Route::get('/kelas-saya', 'index')->name('student.myClass');
        });
    });
});
