<?php

namespace App\Http\Controllers\Staff\Homeroom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeroomLetterController extends Controller
{
    public function index()
    {
        $title = 'Buat Surat';

        return view('staff-pages.homeroom.surat', compact('title'));
    }
}
