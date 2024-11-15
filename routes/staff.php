<?php

use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\Homeroom\GuidanceStudentController;
use App\Http\Controllers\Staff\Homeroom\LetterInvitationController;
use App\Http\Controllers\Staff\Homeroom\RecapitulationController;
use App\Http\Controllers\Staff\NotificationController;
use App\Http\Controllers\Staff\Teacher\AssignmentController;
use App\Http\Controllers\Staff\Teacher\EnterClassroomController;
use App\Http\Controllers\Staff\Teacher\StudyResultController;
use App\Http\Controllers\Staff\Teacher\TaskEvaluationController;
use App\Http\Controllers\Staff\Teacher\UploadMateriController;
use Illuminate\Support\Facades\Route;

Route::prefix('staff')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('staff.dashboard');
    });

    Route::controller(NotificationController::class)->group(function () {
        Route::get('/kirim-notifikasi', 'index')->name('staff.notification');
    });

    Route::prefix('wali-kelas')->group(function(){
        Route::controller(GuidanceStudentController::class)->group(function(){
            Route::get('/murid-bimbingan', 'index')->name('homeroom.guidance');
        });

        Route::controller(RecapitulationController::class)->group(function(){
            Route::get('/rekapitulasi-nilai', 'index')->name('homeroom.recapitulation');
        });

        Route::controller(LetterInvitationController::class)->group(function(){
            Route::get('/surat-undangan', 'index')->name('homeroom.invitattion');
        });
    });

    Route::prefix('guru')->group(function(){
        Route::resource('/masuk-kelas', EnterClassroomController::class);
        Route::resource('/upload-materi', UploadMateriController::class);
        Route::resource('/buat-tugas', AssignmentController::class);
        Route::resource('/penilaian-tugas', TaskEvaluationController::class);
        Route::resource('/kirim-hasil-studi', StudyResultController::class);
    });
});
