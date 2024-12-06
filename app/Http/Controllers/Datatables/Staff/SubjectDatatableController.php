<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubjectDatatableController extends Controller
{
    public function getSubject(){
        $subjects = Subject::query();

        return DataTables::of($subjects)
            ->addIndexColumn()
            ->addColumn('action', function ($subject) {
                return '
                <a wire:navigate href="'. route('subject.edit', $subject->id) .'" class="btn btn-sm btn-primary">Edit</a>
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
}
