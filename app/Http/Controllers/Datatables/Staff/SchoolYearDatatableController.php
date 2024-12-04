<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SchoolYearDatatableController extends Controller
{
    public function getSchoolYear()
    {
        $schoolYears = SchoolYear::query();

        return DataTables::of($schoolYears)
            ->addColumn('action', function ($schoolYear) {
                return '
                <a wire:navigate href="' . route('year.edit', $schoolYear->id) . '" class="btn btn-sm btn-primary">Edit</a>
                 <a wire:navigate href="' . route('year.edit', $schoolYear->id) . '" class="btn btn-sm btn-danger">Hapus</a>
                ';
            })
            ->addColumn('status', function ($schoolYear) {
                return $schoolYear->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $schoolYear->status . '</span>'
                    : '<span class="badge bg-danger">' . $schoolYear->status . '</span>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
