<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
require __DIR__.'/student.php';
require __DIR__.'/staff.php';
require __DIR__.'/datatables.php';
require __DIR__.'/backend.php';


