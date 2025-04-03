<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\SchoolYear;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class AssignmentDatatableController extends Controller
{
    public function getTask($id, $classId)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $tasks = Assignment::where('pengampu_id', $id)->where('kelas_id', $classId)->where('tahun_ajaran_id', $schoolYear->id)->get();

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
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <div style="cursor: pointer" class="dropdown-item" onclick="submitForm(\'form-' . $task->id . '\')">
                                <form action="' . route('assignment.delete', $task->id) . '" method="POST" style="display: inline;" id="form-' . $task->id . '">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <span class="text-danger">Hapus</span>
                                </form>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-item">
                                <a href="' . asset('storage/' . $task->file_soal) . '" download>
                                   <span class="text-black">Lihat soal</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-item">
                                <a href="' . route('teacher.evaluationTask', [
                                    'assignmentId' => $task->id,
                                    'classId' => $task->kelas_id
                                ]) . '">
                                <span class="text-black">Cek pengerjaan</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                ';

                return $deleteForm;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
