<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AssignmentController;
use App\Http\Controllers\Backend\CalendarController;
use App\Http\Controllers\Backend\ClassController;
use Illuminate\Support\Facades\Route;

Route::delete('/class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::delete('/calendar/delete/{id}', [CalendarController::class, 'delete'])->name('calendar.delete');
Route::delete('/assignment/delete/{id}', [AssignmentController::class, 'delete'])->name('assignment.delete');
Route::delete('/schedule/delete/{id}', [AssignmentController::class, 'deleteSchedule'])->name('teachingSchedule.delete');

Route::get('/kalender-akademik', [CalendarController::class, 'getSchedule']);

