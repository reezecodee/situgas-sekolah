<?php

namespace App\Http\Controllers\Raport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RaportController extends Controller
{
    public function cover()
    {
        return view('raport.cover');
    }
    
    public function studentData()
    {
        return view('raport.data-siswa');
    }

    public function academic()
    {
        return view('raport.nilai-akademik');
    }

    public function attitude()
    {
        return view('raport.nilai-sikap');
    }
}
