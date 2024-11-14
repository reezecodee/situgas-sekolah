<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $title = 'Notifikasi Masuk';

        return view('student-pages.notifikasi.index', compact('title'));
    }

    public function read()
    {
        $title = 'Baca Notifikasi';

        return view('student-pages.notifikasi.baca', compact('title'));
    }
}
