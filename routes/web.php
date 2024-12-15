<?php

use App\Http\Controllers\Raport\RaportController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
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

Route::get('/create-symlink', function () {
    $target = storage_path('app/public');  // File atau direktori tujuan
    $link = public_path('storage');  // Lokasi symlink

    if (!File::exists($link)) {
        File::link($target, $link);
        return 'Symlink created successfully!';
    }

    return 'Symlink already exists.';
});


