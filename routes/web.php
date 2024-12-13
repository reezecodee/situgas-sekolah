<?php

use App\Http\Controllers\Raport\RaportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
})->name('landing');

require __DIR__.'/auth.php';
require __DIR__.'/student.php';
require __DIR__.'/staff.php';
require __DIR__.'/datatables.php';
require __DIR__.'/backend.php';


Route::controller(RaportController::class)->prefix('raport')->group(function(){
    Route::get('cover', 'cover')->name('raport.cover');
    Route::get('data-siswa', 'studentData')->name('raport.studentData');
    Route::get('nilai-akademik', 'academic')->name('raport.academic');
    Route::get('nilai-sikap', 'attitude')->name('raport.attitude');

});


