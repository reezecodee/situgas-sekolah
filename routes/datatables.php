<?php

use App\Http\Controllers\Datatables\Staff\AdminDatatablesController;
use App\Http\Controllers\Datatables\Staff\RecapitulationDatatableController;
use App\Http\Controllers\Datatables\Staff\SchoolYearDatatableController;
use App\Http\Controllers\Datatables\Staff\StudentDatatableController;
use App\Http\Controllers\Datatables\Staff\StudyResultDatatableController;
use App\Http\Controllers\Datatables\Staff\SubclassDatatablesController;
use App\Http\Controllers\Datatables\Staff\SubjectDatatableController;
use App\Http\Controllers\Datatables\Staff\TeacherDatatableController;
use Illuminate\Support\Facades\Route;

Route::controller(RecapitulationDatatableController::class)->group(function(){
    Route::get('/data-siswa-rekap', 'getStudents')->name('dt.students');
});

Route::controller(StudyResultDatatableController::class)->group(function(){
    Route::get('/hasil-studi-siswa', 'getStudents')->name('dt.studyResults');
});

Route::controller(SchoolYearDatatableController::class)->group(function(){
    Route::get('/tahun-ajaran', 'getSchoolYear')->name('dt.schoolYear');
    Route::post('/tahun-ajaran/{id}/{status}', 'changeStatus')->name('dt.chStatus');
});

Route::controller(SubclassDatatablesController::class)->group(function(){
    Route::get('/subkelas/{class}', 'getSubclass')->name('dt.subclass');
});

Route::controller(AdminDatatablesController::class)->group(function(){
    Route::get('/admin', 'getAdmin')->name('dt.admin');
});

Route::controller(TeacherDatatableController::class)->group(function(){
    Route::get('/guru', 'getTeacher')->name('dt.teacher');
});

Route::controller(SubjectDatatableController::class)->group(function(){
    Route::get('/mata-pelajaran', 'getSubject')->name('dt.subject');
});

Route::controller(StudentDatatableController::class)->group(function (){
    Route::get('/siswa', 'getStudent')->name('dt.student');
});


