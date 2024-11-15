<?php

namespace App\Http\Controllers\Staff\Homeroom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuidanceStudentController extends Controller
{
    public function index()
    {
        $title = 'Murid Bimbingan';

        return view('staff-pages.homeroom.murid-bimbingan', compact('title'));
    }
}
