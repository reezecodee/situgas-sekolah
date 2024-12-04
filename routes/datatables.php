<?php

use App\Http\Controllers\Datatables\Staff\AdminDatatablesController;
use App\Http\Controllers\Datatables\Staff\RecapitulationDatatableController;
use App\Http\Controllers\Datatables\Staff\SchoolYearDatatableController;
use App\Http\Controllers\Datatables\Staff\StudyResultDatatableController;
use App\Http\Controllers\Datatables\Staff\SubclassDatatablesController;
use App\Livewire\Staff\Admin\Class\Subclass;
use Illuminate\Support\Facades\Route;

Route::controller(RecapitulationDatatableController::class)->group(function(){
    Route::get('/data-siswa-rekap', 'getStudents')->name('dt.students');
});

Route::controller(StudyResultDatatableController::class)->group(function(){
    Route::get('/hasil-studi-siswa', 'getStudents')->name('dt.studyResults');
});

Route::controller(SchoolYearDatatableController::class)->group(function(){
    Route::get('/tahun-ajaran', 'getSchoolYear')->name('dt.schoolYear');
});

Route::controller(SubclassDatatablesController::class)->group(function(){
    Route::get('/subkelas', 'getSubclass')->name('dt.subclass');
});

Route::controller(AdminDatatablesController::class)->group(function(){
    Route::get('/admin', 'getAdmin')->name('dt.admin');
});


