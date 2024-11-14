<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $title = 'Profile Saya';

        return view('student-pages.profile.profile', compact('title'));
    }

    public function privacyData()
    {
        $title = 'Data Privasi Siswa';

        return view('student-pages.profile.data-pribadi', compact('title'));
    }

    public function changePassword()
    {
        $title = 'Ganti Password';

        return view('student-pages.profile.ganti-password', compact('title'));
    }
}
