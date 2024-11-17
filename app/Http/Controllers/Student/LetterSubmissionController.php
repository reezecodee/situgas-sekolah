<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterSubmissionController extends Controller
{
    public function premitAbsent()
    {
        $title = 'Surat Izin Kehadiran';

        return view('student-pages.surat.izin-kehadiran', compact('title'));
    }

    public function premitPleaInternship()
    {
        $title = 'Surat Permohonan PKL';

        return view('student-pages.surat.permohonan-pkl', compact('title'));
    }
}
