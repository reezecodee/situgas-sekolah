<?php

namespace App\Http\Controllers\Staff\Homeroom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecapitulationController extends Controller
{
    public function index()
    {
        $title = 'Rekapitulasi Nilai';

        return view('staff-pages.homeroom.rekap-nilai', compact('title'));
    }
}
