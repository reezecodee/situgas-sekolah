<?php

use App\Http\Controllers\Staff\Admin\ApplicationController;
use App\Http\Controllers\Staff\Admin\CalendarController;
use App\Http\Controllers\Staff\Admin\ClassroomController;
use App\Http\Controllers\Staff\Admin\LetterController;
use App\Http\Controllers\Staff\Admin\MajorController;
use App\Http\Controllers\Staff\Admin\StudentController;
use App\Http\Controllers\Staff\Admin\TeacherController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\Homeroom\GuidanceStudentController;
use App\Http\Controllers\Staff\Homeroom\HomeroomLetterController;
use App\Http\Controllers\Staff\Homeroom\InternshipController;
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

        Route::controller(InternshipController::class)->group(function(){
            Route::get('/manajemen-pkl', 'index')->name('homeroom.internship');
        });
        
        Route::controller(RecapitulationController::class)->group(function(){
            Route::get('/rekapitulasi-nilai', 'index')->name('homeroom.recapitulation');
        });

        Route::controller(HomeroomLetterController::class)->group(function(){
            Route::get('/surat', 'index')->name('homeroom.invitattion');
        });
    });

    Route::prefix('guru')->group(function(){
        Route::resource('/masuk-kelas', EnterClassroomController::class);
        Route::resource('/upload-materi', UploadMateriController::class);
        Route::resource('/buat-tugas', AssignmentController::class);
        Route::resource('/penilaian-tugas', TaskEvaluationController::class);
        Route::resource('/kirim-hasil-studi', StudyResultController::class);
    });

    Route::prefix('admin')->group(function(){
        Route::resource('/prodi', MajorController::class);
        Route::resource('/kelas', ClassroomController::class);
        Route::resource('/guru', TeacherController::class);
        Route::resource('/siswa', StudentController::class);
        Route::resource('/aplikasi', ApplicationController::class);
        Route::resource('/kalender', CalendarController::class);
        Route::resource('/surat', LetterController::class);
    });
});
