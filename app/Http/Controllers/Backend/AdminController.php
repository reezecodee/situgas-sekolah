<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function delete($id)
    {
        $admin = Admin::findOrFail($id);

        if (!$admin) {
            return redirect()->back()->with('failed', 'Admin tidak ditemukan.');
        }

        if ($admin->status === 'aktif') {
            return redirect()->back()->with('failed', 'Admin aktif tidak dapat dihapus.');
        }

        $admin->delete();

        $user = User::find($admin->user_id);
        $user->delete();

        return redirect()->back()->with('success', "Admin {$admin->nama} berhasil dihapus.");
    }
}
