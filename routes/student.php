<?php

use App\Http\Controllers\Student\AssignmentController;
use App\Http\Controllers\Student\CalendarController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\LetterSubmissionController;
use App\Http\Controllers\Student\MyClassController;
use App\Http\Controllers\Student\PKLActivityController;
use App\Http\Controllers\Student\PresenceController;
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

    Route::prefix('kegiatan')->group(function () {
        Route::controller(PresenceController::class)->group(function () {
            Route::get('/presensi', 'index')->name('student.presence');
        });

        Route::controller(AssignmentController::class)->group(function () {
            Route::get('/penugasan', 'index')->name('student.assignment');
        });

        Route::controller(PKLActivityController::class)->group(function () {
            Route::get('/pkl', 'index')->name('student.pkl');
        });
    });

    Route::prefix('surat')->controller(LetterSubmissionController::class)->group(function(){
        Route::get('/izin-tidak-hadir', 'premitAbsent')->name('student.premitAbsent');
        Route::get('/dispenisasi', 'premitDispensation')->name('student.premitDispensation');
        Route::get('/permohonan-pkl', 'premitPleaInternship')->name('student.premitPleaInternship');
    });
});
