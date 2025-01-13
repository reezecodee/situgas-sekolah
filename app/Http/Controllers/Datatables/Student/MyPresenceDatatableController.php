<?php

namespace App\Http\Controllers\Datatables\Student;

use App\Http\Controllers\Controller;
use App\Models\PresenceStudent;
use App\Models\SubjectTeacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MyPresenceDatatableController extends Controller
{
    public function getPresences($id)
    {
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $presences = PresenceStudent::with('presenceTeacher')->where('mapel_id', $subjectTeacher->mapel_id)->get();

        return DataTables::of($presences)
        ->addIndexColumn()
        ->addColumn('hari', function ($presence){
            $carbonDate = Carbon::parse($presence->presenceTeacher->tanggal);
            $day = $carbonDate->translatedFormat('l');
            return $day;
        })
        ->addColumn('status', function($presence){
            if($presence->status == 'Hadir'){
                $bg = 'success';
            }else if($presence->status == 'Izin' && $presence == 'Sakit'){
                $bg = 'warning';
            }else{
                $bg = 'danger';
            }
            return '
                <button class"btn btn-'. $bg .'">'. $presence->status .'</button>
            ';
        })
        ->rawColumns(['status'])
        ->make(true);
    }
}
