<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
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
            ->addColumn('nuptk', function($teacher){
                return $teacher->nuptk ? $teacher->nuptk : '-';
            })
            ->addColumn('email', function($teacher){
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
}
