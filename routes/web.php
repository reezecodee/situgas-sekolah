<?php

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

Route::get('/create-symlink', function () {
    $target = '/home/situgasm/laravel/storage/app/public'; 
    $link = '/home/situgasm/public_html/storage'; 

    if (!File::exists($link)) {
        symlink($target, $link); 
        return 'Symlink created successfully!';
    }

    return 'Symlink already exists.';
});


