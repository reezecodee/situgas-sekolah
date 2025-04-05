<?php

use App\Livewire\Staff\Admin\Admin\CreateAdmin;
use App\Livewire\Staff\Admin\Admin\ListAdmin;
use App\Livewire\Staff\Admin\Calendar\Calendar;
use App\Livewire\Staff\Admin\Calendar\CreateCalendar;
use App\Livewire\Staff\Admin\Class\CreateClass;
use App\Livewire\Staff\Admin\Class\DetailClass;
use App\Livewire\Staff\Admin\Class\EditClass;
use App\Livewire\Staff\Admin\Class\ListClass;
use App\Livewire\Staff\Admin\Class\ShowDetailStudent;
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
use App\Livewire\Staff\Admin\Teacher\AttendanceTeacher;
use App\Livewire\Staff\Admin\Teacher\CreateTeacher;
use App\Livewire\Staff\Admin\Teacher\EditTeacher;
use App\Livewire\Staff\Admin\Teacher\ListTeacher;
use App\Livewire\Staff\Dashboard\Dashboard;
use App\Livewire\Staff\Profile\Profile;
use App\Livewire\Staff\Teacher\Class\EditPresence;
use App\Livewire\Staff\Teacher\Class\EnterClass;
use App\Livewire\Staff\Teacher\Class\Presence;
use App\Livewire\Staff\Teacher\Class\PresenceHistory;
use App\Livewire\Staff\Teacher\Materi\ListMateri;
use App\Livewire\Staff\Teacher\Materi\UploadMateri;
use App\Livewire\Staff\Teacher\Task\EvaluationTask;
use App\Livewire\Staff\Teacher\Task\ListTask;
use App\Livewire\Staff\Teacher\Task\ListTaskCreated;
use App\Livewire\Staff\Teacher\Task\UploadTask;
use Illuminate\Support\Facades\Route;

Route::prefix('staff')->middleware(['auth', 'role:Admin|Guru', 'getDataUser'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('staff.dashboard');
    Route::get('profile-saya', Profile::class)->name('staff.profile');
    Route::get('kalender', Calendar::class)->name('calendar.index');

    Route::prefix('guru')->middleware(['role:Guru', 'staffSchoolYearCheck'])->group(function () {
        Route::prefix('masuk-kelas')->group(function () {
            Route::get('/', EnterClass::class)->name('teacher.enterClass');
            Route::get('{subjectTeacherId}/{classId}/presensi', Presence::class)->name('teacher.presence');
            Route::get('{subjectTeacherId}/{classId}/riwayat', PresenceHistory::class)->name('teacher.presenceHistory');
            Route::get('{teachingScheduleId}/{date}/edit', EditPresence::class)->name('teacher.editPresence');
        });

        Route::prefix('upload-materi')->group(function () {
            Route::get('/', ListMateri::class)->name('teacher.upload');
            Route::get('{subjectTeacherId}/upload', UploadMateri::class)->name('teacher.uploadModule');
        });

        Route::prefix('penugasan')->group(function () {
            Route::get('/', ListTask::class)->name('teacher.task');
            Route::get('{subjectTeacherId}/{classId}/upload', UploadTask::class)->name('teacher.uploadTask');
            Route::get('{subjectTeacherId}/{classId}/tugas-dibuat', ListTaskCreated::class)->name('teacher.taskCreated');
            Route::get('{assignmentId}/{classId}/evaluasi-tugas', EvaluationTask::class)->name('teacher.evaluationTask');
        });
    });

    Route::prefix('admin')->middleware('role:Admin')->group(function () {
        Route::get('admin', ListAdmin::class)->name('admin.list');
        Route::get('admin/create', CreateAdmin::class)->name('admin.create');

        Route::prefix('tahun-ajaran')->group(function () {
            Route::get('', ListYear::class)->name('year.list');
            Route::get('create', CreateYear::class)->name('year.create');
            Route::get('{schoolYearId}/edit', EditYear::class)->name('year.edit');
        });

        Route::prefix('kelas')->group(function () {
            Route::get('/', ListClass::class)->name('class.list');
            Route::get('create', CreateClass::class)->name('class.create');
            Route::get('{classLevel}', Subclass::class)->name('class.subclass');
            Route::get('{classLevel}/{classId}/edit', EditClass::class)->name('class.edit');
            Route::get('{classLevel}/{classId}/detail', DetailClass::class)->name('class.detail');
            Route::get('{classLevel}/{classId}/jadwal-pelajaran', SubjectSchedule::class)->name('class.schedule');
            Route::get('{classId}/data-siswa', ShowDetailStudent::class)->name('class.showDetail');
        });

        Route::prefix('guru')->group(function () {
            Route::get('', ListTeacher::class)->name('teacher.list');
            Route::get('create', CreateTeacher::class)->name('teacher.create');
            Route::get('{teacherId}/edit', EditTeacher::class)->name('teacher.edit');
            Route::get('{teacherId}/kehadiran', AttendanceTeacher::class)->name('teacher.attendance');
        });

        Route::prefix('siswa')->group(function () {
            Route::get('', ListStudent::class)->name('student.list');
            Route::get('create', CreateStudent::class)->name('student.create');
            Route::get('{studentId}/edit', EditStudent::class)->name('student.edit');
        });

        Route::prefix('pelajaran')->group(function () {
            Route::get('/', ListSubject::class)->name('subject.list');
            Route::get('create', CreateSubject::class)->name('subject.create');
            Route::get('{subjectId}/edit', EditSubject::class)->name('subject.edit');
            Route::get('guru-pengampu', ListSubjectTeacher::class)->name('subject.teacher');
            Route::get('guru-pengampu/create', CreateSubjectTeacher::class)->name('subject.createTeacher');
        });

        Route::prefix('jadwal-mengajar')->middleware('staffSchoolYearCheck')->group(function () {
            Route::get('/', ClassList::class)->name('schedule.teaching');
            Route::get('/{level}', CreateSchedule::class)->name('schedule.create');
        });

        Route::get('kalender/create', CreateCalendar::class)->name('calendar.create');
    });
});
