<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        $title = 'Presensi Kehadiran';

        return view('student-pages.kegiatan.presensi.index', compact('title'));
    }
}
