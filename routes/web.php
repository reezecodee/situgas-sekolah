<?php

use App\Http\Controllers\Staff\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/student.php';
require __DIR__.'/staff.php';
require __DIR__.'/datatables.php';


Route::get('/cetak', [TestController::class, 'cetak'])->name('cetak');
