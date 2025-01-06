<?php

use App\Livewire\Staff\Admin\Admin\CreateAdmin;
use App\Livewire\Staff\Admin\Admin\ListAdmin;
use App\Livewire\Staff\Admin\App\Setting;
use App\Livewire\Staff\Admin\Calendar\Calendar;
use App\Livewire\Staff\Admin\Calendar\CreateCalendar;
use App\Livewire\Staff\Admin\Class\CreateClass;
use App\Livewire\Staff\Admin\Class\DetailClass;
use App\Livewire\Staff\Admin\Class\EditClass;
use App\Livewire\Staff\Admin\Class\ListClass;
use App\Livewire\Staff\Admin\Class\Subclass;
use App\Livewire\Staff\Admin\Class\SubjectSchedule;
use App\Livewire\Staff\Admin\Schedule\ClassList;
use App\Livewire\Staff\Admin\Schedule\CreateSchedule;
use App\Livewire\Staff\Admin\SchoolYear\CreateYear;
use App\Livewire\Staff\Admin\SchoolYear\EditYear;
use App\Livewire\Staff\Admin\SchoolYear\ListYear;
use App\Livewire\Staff\Admin\Student\CreateStudent;
use App\Livewire\Staff\Admin\Student\EditStudent;
use App\Livewire\Staff\Admin\Student\ListStudent;
use App\Livewire\Staff\Admin\Subject\CreateSubject;
use App\Livewire\Staff\Admin\Subject\CreateSubjectTeacher;
use App\Livewire\Staff\Admin\Subject\EditSubject;
use App\Livewire\Staff\Admin\Subject\ListSubject;
use App\Livewire\Staff\Admin\Subject\ListSubjectTeacher;
use App\Livewire\Staff\Admin\Teacher\CreateTeacher;
use App\Livewire\Staff\Admin\Teacher\ListTeacher;
use App\Livewire\Staff\Dashboard\Dashboard;
use App\Livewire\Staff\Profile\Profile;
use App\Livewire\Staff\Teacher\Class\EditPresence;
use App\Livewire\Staff\Teacher\Class\EnterClass;
use App\Livewire\Staff\Teacher\Class\Presence;
use App\Livewire\Staff\Teacher\Class\PresenceHistory;
use App\Livewire\Staff\Teacher\Materi\ListMateri;
use App\Livewire\Staff\Teacher\Materi\UploadMateri;
use App\Livewire\Staff\Teacher\Result\ListStudentClass;
use App\Livewire\Staff\Teacher\Result\SendStudyResult;
use App\Livewire\Staff\Teacher\Result\StudyResult;
use App\Livewire\Staff\Teacher\Task\EvaluationTask;
use App\Livewire\Staff\Teacher\Task\ListTask;
use App\Livewire\Staff\Teacher\Task\ListTaskCreated;
use App\Livewire\Staff\Teacher\Task\UploadTask;
use Illuminate\Support\Facades\Route;

Route::prefix('staff')->middleware(['auth', 'role:Admin|Guru', 'getDataUser'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('staff.dashboard');
    Route::get('profile-saya', Profile::class)->name('staff.profile');

    Route::prefix('guru')->middleware('role:Guru')->group(function () {
        Route::get('masuk-kelas', EnterClass::class)->name('teacher.enterClass');
        Route::get('masuk-kelas/{id}/presensi', Presence::class)->name('teacher.presence');
        Route::get('masuk-kelas/{id}/riwayat', PresenceHistory::class)->name('teacher.presenceHistory');
        Route::get('masuk-kelas/{id}/{date}/edit', EditPresence::class)->name('teacher.editPresence');

        Route::get('upload-materi', ListMateri::class)->name('teacher.upload');
        Route::get('upload-materi/{id}/upload', UploadMateri::class)->name('teacher.uploadModule');

        Route::get('penugasan', ListTask::class)->name('teacher.task');
        Route::get('penugasan/{id}/upload', UploadTask::class)->name('teacher.uploadTask');
        Route::get('penugasan/{id}/tugas-dibuat', ListTaskCreated::class)->name('teacher.taskCreated');
        Route::get('penugasan/{id1}/{id2}/evaluasi-tugas', EvaluationTask::class)->name('teacher.evaluationTask');

        Route::get('kirim-hasil-studi', StudyResult::class)->name('teacher.studyResult');
        Route::get('kirim-hasil-studi/daftar-siswa', ListStudentClass::class)->name('teacher.studentList');
        Route::get('kirim-hasil-studi/kirim', SendStudyResult::class)->name('teacher.sendStudyResult');
    });

    Route::prefix('admin')->middleware('role:Admin')->group(function () {
        Route::get('admin', ListAdmin::class)->name('admin.list');
        Route::get('admin/create', CreateAdmin::class)->name('admin.create');

        Route::get('tahun-ajaran', ListYear::class)->name('year.list');
        Route::get('tahun-ajaran/create', CreateYear::class)->name('year.create');
        Route::get('tahun-ajaran/{id}/edit', EditYear::class)->name('year.edit');

        Route::get('kelas', ListClass::class)->name('class.list');
        Route::get('kelas/create', CreateClass::class)->name('class.create');
        Route::get('kelas/{class}', Subclass::class)->name('class.subclass');
        Route::get('kelas/{class}/{id}/edit', EditClass::class)->name('class.edit');
        Route::get('kelas/{class}/{id}/detail', DetailClass::class)->name('class.detail');
        Route::get('kelas/{class}/{id}/jadwal-pelajaran', SubjectSchedule::class)->name('class.schedule');

        Route::get('guru', ListTeacher::class)->name('teacher.list');
        Route::get('guru/create', CreateTeacher::class)->name('teacher.create');

        Route::get('siswa', ListStudent::class)->name('student.list');
        Route::get('siswa/create', CreateStudent::class)->name('student.create');
        Route::get('siswa/{id}/edit', EditStudent::class)->name('student.edit');

        Route::get('pelajaran', ListSubject::class)->name('subject.list');
        Route::get('pelajaran/create', CreateSubject::class)->name('subject.create');
        Route::get('pelajaran/{id}/edit', EditSubject::class)->name('subject.edit');
        Route::get('pelajaran/guru-pengampu', ListSubjectTeacher::class)->name('subject.teacher');
        Route::get('pelajaran/guru-pengampu/create', CreateSubjectTeacher::class)->name('subject.createTeacher');

        Route::get('jadwal-mengajar', ClassList::class)->name('schedule.teaching');
        Route::get('jadwal-mengajar/{level}', CreateSchedule::class)->name('schedule.create');

        Route::get('pengaturan', Setting::class)->name('app.setting');

        Route::get('kalender', Calendar::class)->name('calendar.index');
        Route::get('kalender/create', CreateCalendar::class)->name('calendar.create');
    });
});
