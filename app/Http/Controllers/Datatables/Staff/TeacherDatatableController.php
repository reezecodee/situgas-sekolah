<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\PresenceTeacher;
use App\Models\SchoolYear;
use App\Models\Teacher;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class TeacherDatatableController extends Controller
{
    public function getTeacher()
    {
        $teachers = Teacher::with('user');

        return DataTables::of($teachers)
            ->addIndexColumn()
            ->addColumn('action', function ($teacher) {
                return '
                <div class="d-flex gap-1 align-items-center">
                <a wire:navigate href="' . route('teacher.edit', $teacher->id) . '" class="btn btn-sm btn-primary">Edit</a>
                <a href="'. route('teacher.attendance', $teacher->id) .'" class="btn btn-sm btn-warning">Kehadiran</a>
                <a wire:click="downloadSchedule(\'' . $teacher->id . '\')" class="btn btn-sm btn-success inline">Download Jadwal</a>
                </div>
            ';
            })
            ->addColumn('nuptk', function ($teacher) {
                return $teacher->nuptk ? $teacher->nuptk : '-';
            })
            ->addColumn('email', function ($teacher) {
                return $teacher->user->email;
            })
            ->addColumn('status', function ($teacher) {
                $btnClass = $teacher->status === "Aktif" ? "success" : "danger";
                $id = $teacher->id;
                $status = $teacher->status;
                $routeName = 'dt.chStatusTeacher';
                return view('components.staff.dropdown.status', compact('btnClass', 'id', 'status', 'routeName'))->render();
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function changeStatus($id, $status)
    {
        $teacher = Teacher::findOrFail($id);

        if (!in_array($status, ['Aktif', 'Tidak aktif'])) {
            return back()->with('failed', 'Status tidak valid.');
        }

        $teacher->status = $status;
        $teacher->save();

        return redirect()->to(route('teacher.list'))->with("success", "Berhasil memperbarui status akun {$teacher->nama} ke {$status}.");
    }

    public function getPresenceHistory($id, $classId)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $histories = PresenceTeacher::where('pengampu_id', $id)->where('tahun_ajaran_id', $schoolYear->id)->where('kelas_id', $classId)->get();

        return DataTables::of($histories)
            ->addIndexColumn()
            ->addColumn('bukti', function ($history) {
                return '<a download href="/storage/' . $history->bukti . '">Download bukti</a>';
            })
            ->addColumn('action', function ($history) {
                return '
                <a wire:navigate href="' . route('teacher.editPresence', ['teachingScheduleId' => $history->jadwal_mengajar_id, 'date' => $history->tanggal]) . '" class="btn btn-sm btn-primary">Edit</a>
                <a wire:click="downloadExcel(\'' . $history->id . '\')"  class="btn btn-sm btn-success">Rekap</a>
            ';
            })
            ->rawColumns(['action', 'bukti'])
            ->make(true);
    }

    public function getAttendanceHistory($id)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $histories = PresenceTeacher::with(['subjectTeacher', 'classroom'])->where('pengampu_id', $id)->where('tahun_ajaran_id', $schoolYear->id)->get();

        return DataTables::of($histories)
            ->addIndexColumn()
            ->addColumn('mata_pelajaran', function($history){
                return $history->subjectTeacher->subject->nama;
            })
            ->addColumn('kelas', function($history){
                return "{$history->classrooms->tingkat} {$history->classrooms->nama}";
            })
            ->addColumn('tanggal', function($history){
                return Carbon::parse($history->tanggal)->translatedFormat('l, d F Y');;
            })
            ->addColumn('bukti', function ($history) {
                return '<a download href="/storage/' . $history->bukti . '">Bukti</a>';
            })
            ->addColumn('action', function ($history) {
                return '
                <a download class="btn btn-sm btn-primary" href="/storage/' . $history->bukti . '">Bukti</a>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
