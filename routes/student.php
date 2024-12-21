<?php

use App\Livewire\Student\Academics\Calendar\Calendar;
use App\Livewire\Student\Academics\Class\MyClass;
use App\Livewire\Student\Academics\Schedule\Schedule;
use App\Livewire\Student\Activities\Assignment\Assignment;
use App\Livewire\Student\Activities\Assignment\ListAssignment;
use App\Livewire\Student\Activities\Assignment\UploadAssignment;
use App\Livewire\Student\Dashboard\Dashboard;
use App\Livewire\Student\Profile\ChangePassword;
use App\Livewire\Student\Profile\DataPrivacy;
use App\Livewire\Student\Profile\Profile;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->middleware(['role:Siswa', 'auth', 'getDataUser'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('student.dashboard');

    Route::prefix('akademik')->group(function () {
        Route::get('kalender', Calendar::class)->name('student.calendar');
        Route::get('jadwal-pelajaran', Schedule::class)->name('student.schedule');
        Route::get('kelas-saya', MyClass::class)->name('student.myClass');
    });

    Route::prefix('kegiatan')->group(function () {
        Route::get('penugasan', Assignment::class)->name('student.assignment');
        Route::get('penugasan/{id}/daftar', ListAssignment::class)->name('student.listAssign');
        Route::get('penugasan/{id}/upload', UploadAssignment::class)->name('student.uploadAssignment');
    });

    Route::get('profile', Profile::class)->name('student.profile');
    Route::get('data-pribadi', DataPrivacy::class)->name('student.dataPrivacy');
    Route::get('ganti-password', ChangePassword::class)->name('student.changePassword');
});

