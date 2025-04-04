<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use Yajra\DataTables\Facades\DataTables;

class SubjectDatatableController extends Controller
{
    public function getSubject()
    {
        $subjects = Subject::query();

        return DataTables::of($subjects)
            ->addIndexColumn()
            ->addColumn('action', function ($subject) {
                return '
                <a wire:navigate href="' . route('subject.edit', $subject->id) . '" class="btn btn-sm btn-primary">Edit</a>
            ';
            })
            ->addColumn('status', function ($subject) {
                return $subject->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $subject->status . '</span>'
                    : '<span class="badge bg-danger">' . $subject->status . '</span>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function getSubjectTeacher()
    {
        $subjectTeachers = SubjectTeacher::with(['teacher', 'subject']);

        return DataTables::of($subjectTeachers)
            ->addIndexColumn()
            ->addColumn('nama', function($st){
                return $st->teacher->nama;
            })
            ->addColumn('pelajaran', function($st){
                return $st->subject->nama;
            })
            ->addColumn('action', function ($st) {
                if ($st->teachingSchedule()->count() === 0) {
                    return '
                        <form action="' . route('subjectTeacher.delete', $st->id) . '" method="POST" id="form-'.$st->id.'">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="button" onclick="submitForm(\'form-'. $st->id .'\')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    ';
                } else {
                    return 'Tidak dapat dihapus';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
