<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        $title = 'Bantuan Pengguna';

        return view('student-pages.bantuan.index', compact('title'));
    }
}
