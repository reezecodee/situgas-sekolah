<?php

namespace App\Http\Controllers\Datatables\Student;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\SchoolYear;
use Yajra\DataTables\Facades\DataTables;

class MateriDatatableController extends Controller
{
    public function getMateris($id)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $materis = Materi::where('tahun_ajaran_id', $schoolYear->id)->where('pengampu_id', $id)->orderBy('created_at', 'asc')->get();

        return DataTables::of($materis)
            ->addIndexColumn()
            ->addColumn('action', function($materi){
                return '
                <a download href="'. asset('storage/'.$materi->file_materi) .'" class="btn btn-primary">Download</a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
