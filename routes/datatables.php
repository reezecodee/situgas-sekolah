<?php

use App\Http\Controllers\Datatables\Staff\RecapitulationDatatableController;
use Illuminate\Support\Facades\Route;

Route::controller(RecapitulationDatatableController::class)->group(function(){
    Route::get('/data-siswa-rekap', 'getStudents')->name('dt.students');
});
