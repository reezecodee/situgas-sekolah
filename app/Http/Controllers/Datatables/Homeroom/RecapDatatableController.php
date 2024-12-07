<?php

namespace App\Http\Controllers\Datatables\Homeroom;

use App\Http\Controllers\Controller;
use App\Models\Classrooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RecapDatatableController extends Controller
{
    public function getRecap(){
        $user = User::with('teacher')->find(Auth::user()->id);
        $students = Classrooms::with('students')->where('wali_kelas_id', $user->teacher->id)->get();

        return DataTables::of($students)
            ->addIndexColumn()
            ->addColumn('action', function ($student) {
                return '';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
