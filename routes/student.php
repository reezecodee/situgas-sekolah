<?php

use App\Livewire\Student\Academics\Calendar\Calendar;
use App\Livewire\Student\Academics\Class\MyClass;
use App\Livewire\Student\Academics\Schedule\Schedule;
use App\Livewire\Student\Activities\Assignment\Assignment;
use App\Livewire\Student\Activities\Assignment\ListAssignment;
use App\Livewire\Student\Activities\Assignment\UploadAssignment;
use App\Livewire\Student\Activities\Materi\DownloadMateri;
use App\Livewire\Student\Activities\Presence\MyPresence;
use App\Livewire\Student\Dashboard\Dashboard;
use App\Livewire\Student\Profile\Profile;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->middleware(['role:Siswa', 'auth', 'getDataUser', 'studentSchoolYearCheck'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('student.dashboard');

    Route::prefix('akademik')->group(function () {
        Route::get('kalender', Calendar::class)->name('student.calendar');
        Route::get('jadwal-pelajaran', Schedule::class)->name('student.schedule');
        Route::get('kelas-saya', MyClass::class)->name('student.myClass');
    });

    Route::prefix('kegiatan')->group(function () {
        Route::prefix('penugasan')->group(function(){
            Route::get('/', Assignment::class)->name('student.assignment');
            Route::get('{subjectTeacherId}/daftar', ListAssignment::class)->name('student.listAssign');
            Route::get('{assignmentId}/upload', UploadAssignment::class)->name('student.uploadAssignment');
        });

        Route::get('materi-belajar/{subjectTeacherId}', DownloadMateri::class)->name('student.downloadMateri');
        Route::get('absensi-saya/{subjectTeacherId}', MyPresence::class)->name('student.myPresence');
    });

    Route::get('profile', Profile::class)->name('student.profile');
});

