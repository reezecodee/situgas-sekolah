<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function deleteMateri($id)
    {
        $materi = Materi::findOrFail($id);

        try {
            if ($materi->file_materi && Storage::disk('public')->exists($materi->file_materi)) {
                Storage::disk('public')->delete($materi->file_materi);
            }

            $materi->delete();

            session()->flash('success', 'Berhasil menghapus materi');
        } catch (\Exception $e) {
            session()->flash('failed', 'Terjadi kesalahan saat menghapus materi');
        }

        return redirect()->route('teacher.uploadModule', $materi->pengampu_id);
    }
}
