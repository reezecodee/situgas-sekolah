<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Classrooms;

class ClassController extends Controller
{
    public function delete($id)
    {
        $classroom = Classrooms::findOrFail($id);

        if (!$classroom) {
            return redirect()->back()->with('failed', 'Kelas tidak ditemukan.');
        }

        if ($classroom->students()->count() > 0) {
            return redirect()->back()->with('failed', 'Kelas memiliki siswa, tidak dapat dihapus.');
        }

        $classroom->delete();
        return redirect()->back()->with('success', "Kelas {$classroom->tingkat} {$classroom->nama} berhasil dihapus.");
    }
}
