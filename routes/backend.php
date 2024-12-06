<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CalendarController;
use App\Http\Controllers\Backend\ClassController;
use Illuminate\Support\Facades\Route;

Route::delete('/class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete');

Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

Route::delete('/calendar/delete/{id}', [CalendarController::class, 'delete'])->name('calendar.delete');

Route::get('/kalender-akademik', [CalendarController::class, 'getSchedule']);

