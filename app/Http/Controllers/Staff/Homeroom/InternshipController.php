<?php

namespace App\Http\Controllers\Staff\Homeroom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $title = 'Manajemen PKL';

        return view('staff-pages.homeroom.manajemen-pkl', compact('title'));
    }
}
