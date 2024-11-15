<?php

namespace App\Http\Controllers\Staff\Homeroom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterInvitationController extends Controller
{
    public function index()
    {
        $title = 'Buat Surat Undangan';

        return view('staff-pages.homeroom.rekap-nilai', compact('title'));
    }
}
