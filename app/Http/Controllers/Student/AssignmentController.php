<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $title = 'Ruang Penugasan';

        return view('student-pages.kegiatan.penugasan.index', compact('title'));
    }
}
