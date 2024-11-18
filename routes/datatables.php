<?php

use App\Http\Controllers\Datatables\Staff\RecapitulationDatatableController;
use App\Http\Controllers\Datatables\Staff\StudyResultDatatableController;
use Illuminate\Support\Facades\Route;

Route::controller(RecapitulationDatatableController::class)->group(function(){
    Route::get('/data-siswa-rekap', 'getStudents')->name('dt.students');
});

Route::controller(StudyResultDatatableController::class)->group(function(){
    Route::get('/hasil-studi-siswa', 'getStudents')->name('dt.studyResults');
});
