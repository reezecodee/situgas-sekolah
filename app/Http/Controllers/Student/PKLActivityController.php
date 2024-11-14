<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PKLActivityController extends Controller
{
    public function index()
    {
        $title = 'Kegiatan PKL';

        return view('student-pages.kegiatan.magang.index', compact('title'));
    }
}
