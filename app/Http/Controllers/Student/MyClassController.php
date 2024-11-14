<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyClassController extends Controller
{
    public function index()
    {
        $title = 'Kelas Saya';

        return view('student-pages.kelas-saya.index', compact('title'));
    }
}
