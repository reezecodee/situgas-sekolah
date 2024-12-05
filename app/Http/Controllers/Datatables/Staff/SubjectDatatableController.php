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
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
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
