<?php

namespace App\Http\Controllers\Datatables\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AssignmentDatatableController extends Controller
{
    public function getAssignment($id)
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $assignments = Assignment::with('submission')->where('tahun_ajaran_id', $schoolYear->id)->where('pengampu_id', $id)
            ->get();

        return DataTables::of($assignments)
            ->addIndexColumn()
            ->addColumn('tgl_mulai', function ($assignment) {
                return Carbon::parse($assignment->tgl_mulai)->translatedFormat('d F Y');
            })
            ->addColumn('tgl_selesai', function ($assignment) {
                return Carbon::parse($assignment->tgl_selesai)->translatedFormat('d F Y');
            })
            ->addColumn('nilai', function ($assignment) use ($student) {
                $submission = Submission::where('siswa_id', $student->id)
                    ->where('penugasan_id', $assignment->id)
                    ->first();
                return $submission ? $submission->nilai ?? '0' : '0'; 
            })
            ->addColumn('komentar_guru', function ($assignment) use ($student) {
                $submission = Submission::where('siswa_id', $student->id)
                    ->where('penugasan_id', $assignment->id)
                    ->first();
                return $submission ? $submission->komentar_guru ?? '-' : '-'; 
            })
            ->addColumn('file_soal', function ($assignment) {
                return '<a target="blank" href="' . asset('storage/' . $assignment->file_soal) . '">Lihat soal</a>';
            })
            ->addColumn('status', function ($assignment) {
                $studentId = Auth::user()->student->id;
                $submission = $assignment->submission->firstWhere('siswa_id', $studentId);
                $color = $submission && $submission->status == 'Dikerjakan' ? 'success' : 'danger';

                return $submission ? '<span class="badge bg-'.$color.'">'.($submission->status == "Dikerjakan" ? "Sudah mengerjakan" : $submission->status).'</span>' : '<span class="badge bg-warning">Belum Mengerjakan</span>';
            })
            ->addColumn('action', function ($assignment) {
                $studentId = Auth::user()->student->id;
                $submission = $assignment->submission->firstWhere('siswa_id', $studentId);

                if ($submission) {
                    $button = '<a href="'. route('student.uploadAssignment', $assignment->id) .'" class="btn btn-primary">Upload ulang</a>
                <a download href="' . asset('storage/' . $submission->file_pengerjaan) . '" class="btn btn-success">Lihat</a>
                <a download href="'. asset('storage/'.$assignment->file_soal) .'" class="btn btn-warning">Soal</a>';
                } else {
                    $button = '<a href="'. route('student.uploadAssignment', $assignment->id) .'" class="btn btn-primary">Kerjakan</a>
                    <a download href="'. asset('storage/'.$assignment->file_soal) .'" class="btn btn-warning">Soal</a>
                ';
                }

                return '<div class="d-flex gap-1">'.$button.'</div>';
            })
            ->rawColumns(['action', 'status', 'file_soal'])
            ->make(true);
    }
}
