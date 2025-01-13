<?php

use App\Http\Controllers\Datatables\Staff\AdminDatatablesController;
use App\Http\Controllers\Datatables\Staff\AssignmentDatatableController;
use App\Http\Controllers\Datatables\Staff\CalendarDatatableController;
use App\Http\Controllers\Datatables\Staff\SchoolYearDatatableController;
use App\Http\Controllers\Datatables\Staff\StudentDatatableController;
use App\Http\Controllers\Datatables\Staff\SubclassDatatablesController;
use App\Http\Controllers\Datatables\Staff\SubjectDatatableController;
use App\Http\Controllers\Datatables\Staff\TeacherDatatableController;
use App\Http\Controllers\Datatables\Student\AssignmentDatatableController as StudentAssignmentDatatableController;
use App\Http\Controllers\Datatables\Student\MateriDatatableController;
use App\Http\Controllers\Datatables\Student\MyPresenceDatatableController;
use Illuminate\Support\Facades\Route;

Route::controller(SchoolYearDatatableController::class)->group(function () {
    Route::get('/tahun-ajaran', 'getSchoolYear')->name('dt.schoolYear');
    Route::post('/tahun-ajaran/{id}/{status}', 'changeStatus')->name('dt.chStatusYear');
});

Route::controller(SubclassDatatablesController::class)->group(function () {
    Route::get('/subkelas/{class}', 'getSubclass')->name('dt.subclass');
});

Route::controller(AdminDatatablesController::class)->group(function () {
    Route::get('/admin', 'getAdmin')->name('dt.admin');
});

Route::controller(TeacherDatatableController::class)->group(function () {
    Route::get('/guru', 'getTeacher')->name('dt.teacher');
    Route::post('/guru/{id}/{status}', 'changeStatus')->name('dt.chStatusTeacher');
    Route::get('/riwayat-absensi/{id}', 'getPresenceHistory')->name('dt.presenceHistory');
});

Route::controller(SubjectDatatableController::class)->group(function () {
    Route::get('/mata-pelajaran', 'getSubject')->name('dt.subject');
    Route::get('/guru-pengampu', 'getSubjectTeacher')->name('dt.subjectTeacher');
});

Route::controller(StudentDatatableController::class)->group(function () {
    Route::get('/siswa', 'getStudent')->name('dt.student');
});

Route::controller(CalendarDatatableController::class)->group(function () {
    Route::get('/kalender-kegiatan', 'getCalendar')->name('dt.calendar');
});

Route::controller(AssignmentDatatableController::class)->group(function () {
    Route::get('/tugas/{id}/{classId}', 'getTask')->name('dt.task');
});

Route::controller(StudentAssignmentDatatableController::class)->group(function(){
    Route::get('/tugas-siswa/{id}', 'getAssignment')->name('dt.taskStudent');
});

Route::controller(MateriDatatableController::class)->group(function(){
    Route::get('/materi/{id}', 'getMateris')->name('dt.downloadMateri');
});

Route::controller(MyPresenceDatatableController::class)->group(function(){
    Route::get('/absensi/{id}', 'getPresences')->name('dt.myPresence');
});
