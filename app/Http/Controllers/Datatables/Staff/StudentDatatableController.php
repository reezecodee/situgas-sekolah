<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentDatatableController extends Controller
{
    public function getStudent(){
        $students = Student::with(['user', 'classroom']);

        return DataTables::of($students)
            ->addIndexColumn()
            ->addColumn('action', function ($student) {
                return '
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
            ';
            })
            ->addColumn('email', function($student){
                return $student->user->email;
            })
            ->addColumn('kelas', function($student){
                return $student->classroom->nama;
            })
            ->addColumn('status', function ($student) {
                return $student->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $student->status . '</span>'
                    : '<span class="badge bg-danger">' . $student->status . '</span>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}