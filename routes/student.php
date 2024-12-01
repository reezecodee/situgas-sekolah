<?php

use App\Livewire\Student\Academics\Calendar\Calendar;
use App\Livewire\Student\Academics\Class\MyClass;
use App\Livewire\Student\Academics\Schedule\Schedule;
use App\Livewire\Student\Activities\Assignment\Assignment;
use App\Livewire\Student\Activities\Internship\Internship;
use App\Livewire\Student\Activities\Presence\PresenceStudent;
use App\Livewire\Student\Dashboard\Dashboard;
use App\Livewire\Student\Help\Help;
use App\Livewire\Student\Letters\Premit;
use App\Livewire\Student\Letters\PremitPleaIntern;
use App\Livewire\Student\Notification\Notification;
use App\Livewire\Student\Notification\ReadNotif;
use App\Livewire\Student\Profile\ChangePassword;
use App\Livewire\Student\Profile\DataPrivacy;
use App\Livewire\Student\Profile\Profile;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('student.dashboard');

    Route::prefix('akademik')->group(function () {
        Route::get('kalender', Calendar::class)->name('student.calendar');
        Route::get('jadwal-pelajaran', Schedule::class)->name('student.schedule');
        Route::get('kelas-saya', MyClass::class)->name('student.myClass');
    });

    Route::prefix('kegiatan')->group(function () {
        Route::get('presensi', PresenceStudent::class)->name('student.presence');
        Route::get('penugasan', Assignment::class)->name('student.assignment');
        Route::get('pkl', Internship::class)->name('student.pkl');
    });

    Route::prefix('surat')->group(function(){
        Route::get('izin-tidak-hadir', Premit::class)->name('student.premitAbsent');
        Route::get('permohonan-pkl', PremitPleaIntern::class)->name('student.premitPleaInternship');
    });

    Route::get('bantuan', Help::class)->name('student.help');

    Route::get('profile', Profile::class)->name('student.profile');
    Route::get('data-pribadi', DataPrivacy::class)->name('student.dataPrivacy');
    Route::get('ganti-password', ChangePassword::class)->name('student.changePassword');

    Route::get('notifikasi', Notification::class)->name('student.notification');
    Route::get('baca-notifikasi', ReadNotif::class)->name('student.readNotification');
});

