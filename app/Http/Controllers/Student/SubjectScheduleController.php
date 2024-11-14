<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectScheduleController extends Controller
{
    public function index()
    {
        $title = 'Jadwal Pelajaran';

        return view('student-pages.akademik.pelajaran.index', compact('title'));
    }
}
