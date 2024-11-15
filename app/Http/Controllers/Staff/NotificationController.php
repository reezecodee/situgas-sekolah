<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $title = 'Kirim Notifikasi';

        return view('staff-pages.notification.index', compact('title'));
    }
}
