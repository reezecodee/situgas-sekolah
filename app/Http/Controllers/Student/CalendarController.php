<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $title = 'Kalender Akademik';

        return view('student-pages.akademik.kalender.index', compact('title'));
    }
}
