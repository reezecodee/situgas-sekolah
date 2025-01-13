<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\PresenceTeacher;
use App\Models\SchoolYear;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeacherDatatableController extends Controller
{
    public function getTeacher()
    {
        $teachers = Teacher::with('user');

        return DataTables::of($teachers)
            ->addIndexColumn()
            ->addColumn('action', function ($teacher) {
                return '
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
            ';
            })
            ->addColumn('nuptk', function ($teacher) {
                return $teacher->nuptk ? $teacher->nuptk : '-';
            })
            ->addColumn('email', function ($teacher) {
                return $teacher->user->email;
            })
            ->addColumn('status', function ($teacher) {
                $btnClass = $teacher->status === "Aktif" ? "success" : "danger";
                $id = $teacher->id;
                $status = $teacher->status;
                $routeName = 'dt.chStatusTeacher';
                return view('components.staff.dropdown.status', compact('btnClass', 'id', 'status', 'routeName'))->render();
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function changeStatus($id, $status)
    {
        $teacher = Teacher::findOrFail($id);

        if (!in_array($status, ['Aktif', 'Tidak aktif'])) {
            return back()->with('failed', 'Status tidak valid.');
        }

        $teacher->status = $status;
        $teacher->save();

        return redirect()->to(route('teacher.list'))->with("success", "Berhasil memperbarui status akun {$teacher->nama} ke {$status}.");
    }

    public function getPresenceHistory($id, $classId)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $histories = PresenceTeacher::where('pengampu_id', $id)->where('tahun_ajaran_id', $schoolYear->id)->where('kelas_id', $classId)->get();

        return DataTables::of($histories)
            ->addIndexColumn()
            ->addColumn('bukti', function($history){
                return '<a download href="/storage/'. $history->bukti .'">Download bukti</a>';
            })
            ->addColumn('action', function ($history) {
                return '
                <a wire:navigate href="'. route('teacher.editPresence', ['id' => $history->jadwal_mengajar_id, 'date' => $history->tanggal]) .'" class="btn btn-sm btn-primary">Edit</a>
                <a wire:click="downloadExcel(\''.$history->id.'\')"  class="btn btn-sm btn-success">Rekap</a>
            ';
            })
            ->rawColumns(['action', 'bukti'])
            ->make(true);
    }
}
