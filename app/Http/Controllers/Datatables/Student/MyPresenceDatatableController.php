<?php

namespace App\Http\Controllers\Datatables\Student;

use App\Http\Controllers\Controller;
use App\Models\PresenceStudent;
use App\Models\Student;
use App\Models\SubjectTeacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MyPresenceDatatableController extends Controller
{
    public function getPresences($id)
    {
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        $presences = PresenceStudent::with('presenceTeacher')
            ->where('mapel_id', $subjectTeacher->mapel_id)
            ->where('siswa_id', $student->id)
            ->get();

        return DataTables::of($presences)
            ->addIndexColumn()
            ->addColumn('tanggal', function ($presence) {
                return $presence->presenceTeacher->tanggal;
            })
            ->addColumn('hari', function ($presence) {
                $carbonDate = Carbon::parse($presence->presenceTeacher->tanggal);
                return $carbonDate->translatedFormat('l');
            })
            ->addColumn('status', function ($presence) {
                $bg = 'danger'; 
                if ($presence->status_kehadiran == 'Hadir') {
                    $bg = 'success';
                } else if ($presence->status_kehadiran == 'Izin' && $presence->status_kehadiran == 'Sakit') {
                    $bg = 'warning';
                }

                return '<button class="btn btn-' . $bg . '">' . $presence->status_kehadiran . '</button>';
            })
            ->rawColumns(['status'])  
            ->make(true);  
    }
}
