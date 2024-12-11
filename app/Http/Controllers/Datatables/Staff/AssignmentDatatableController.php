<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\SchoolYear;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AssignmentDatatableController extends Controller
{
    public function getTask($id)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $tasks = Assignment::where('jadwal_mengajar_id', $id)->where('tahun_ajaran_id', $schoolYear->id)->get();

        return DataTables::of($tasks)
            ->addIndexColumn()
            ->addColumn('tgl_mulai', function($task){
                return Carbon::parse($task->tgl_mulai)->translatedFormat('d F Y');
            })
            ->addColumn('tgl_selesai', function($task){
                return Carbon::parse($task->tgl_selesai)->translatedFormat('d F Y');
            })
            ->addColumn('action', function ($task) {
                $deleteForm = '
                    <form action="' . route('assignment.delete', $task->id) . '" method="POST" style="display:inline;" id="form-' . $task->id . '">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="button" class="btn btn-sm btn-danger" onclick="submitForm(\'form-' . $task->id . '\')">Hapus</button>
                    </form>
                    <a href="'. asset('storage/'. $task->file_soal) .'">
                        <button type="button" class="btn btn-sm btn-primary">Lihat soal</button>
                    </a>
                    <br>
                    <a href="'. route('teacher.evaluationTask', [
                        'id1' => $task->jadwal_mengajar_id,
                        'id2' => $task->id
                    ]) .'">
                        <button type="button" class="btn btn-sm btn-success">Cek pengerjaan</button>
                    </a>
                ';

                return $deleteForm;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
