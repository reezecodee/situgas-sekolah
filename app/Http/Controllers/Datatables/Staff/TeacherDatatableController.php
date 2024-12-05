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
                return $teacher->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $teacher->status . '</span>'
                    : '<span class="badge bg-danger">' . $teacher->status . '</span>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
