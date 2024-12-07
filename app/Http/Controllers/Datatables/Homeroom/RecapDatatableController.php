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

        $classrooms = Classrooms::with('students')
            ->where('wali_kelas_id', $user->teacher->id)
            ->get();

        $students = $classrooms->pluck('students')->flatten();

        return DataTables::of($students)
            ->addIndexColumn()
            ->addColumn('action', function ($student) {
                return '
                    <button class="btn btn-sm btn-success"
                        wire:click="$dispatch(\'show-modal\', { id: \'' . $student->id . '\' })">
                        Cetak Raport
                    </button>
                    <a href="'. route('homeroom.attitude') .'" wire:navigate>
                    <button class="btn btn-sm btn-primary">Beri Nilai Sikap</button>
                    </a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
