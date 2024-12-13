<?php

namespace App\Http\Controllers\Datatables\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AssignmentDatatableController extends Controller
{
    public function getAssignment($id)
    {
        $assignments = Assignment::where('jadwal_mengajar_id', $id)
            ->with('submission')->get();

        return DataTables::of($assignments)
            ->addIndexColumn()
            ->addColumn('tgl_mulai', function ($assignment) {
                return Carbon::parse($assignment->tgl_mulai)->translatedFormat('d F Y');
            })
            ->addColumn('tgl_selesai', function ($assignment) {
                return Carbon::parse($assignment->tgl_selesai)->translatedFormat('d F Y');
            })
            ->addColumn('file_soal', function ($assignment) {
                return '<a target="blank" href="' . asset('storage/' . $assignment->file_soal) . '">Lihat soal</a>';
            })
            ->addColumn('status', function ($assignment) {
                $studentId = Auth::user()->student->id;
                $submission = $assignment->submission->firstWhere('siswa_id', $studentId);

                return $submission ? '<span class="badge bg-success">Sudah Mengerjakan</span>' : '<span class="badge bg-warning">Belum Mengerjakan</span>';
            })
            ->addColumn('action', function ($assignment) {
                $studentId = Auth::user()->student->id;
                $submission = $assignment->submission->firstWhere('siswa_id', $studentId);

                if ($submission) {
                    $button = '<a href="'. route('student.uploadAssignment', $assignment->id) .'" class="btn btn-primary">Upload ulang</a>
                <a target="blank" href="' . asset('storage/' . $submission->file_pengerjaan) . '" class="btn btn-success">Lihat</a>
                <a target="blank" href="'. asset('storage/'.$assignment->file_soal) .'" class="btn btn-warning">Soal</a>';
                } else {
                    $button = '<a href="'. route('student.uploadAssignment', $assignment->id) .'" class="btn btn-primary">Kerjakan</a>
                    <a target="blank" href="'. asset('storage/'.$assignment->file_soal) .'" class="btn btn-warning">Soal</a>
                ';
                }

                return $button;
            })
            ->rawColumns(['action', 'status', 'file_soal'])
            ->make(true);
    }
}
