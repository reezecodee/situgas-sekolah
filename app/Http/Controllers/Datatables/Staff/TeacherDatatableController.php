<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeacherDatatableController extends Controller
{
    public function getTeacher()
    {
        $teachers = collect([
            (object) ['id' => 1, 'name' => 'Guru 1', 'telepon' => '081234567890', 'status' => 'Aktif'],
            (object) ['id' => 2, 'name' => 'Guru 2', 'telepon' => '081987654321', 'status' => 'Tidak Aktif'],
            (object) ['id' => 3, 'name' => 'Guru 3', 'telepon' => '081234876543', 'status' => 'Aktif'],
        ]);

        // Datatables processing
        return DataTables::of($teachers)
            ->addColumn('action', function ($teacher) {
                return '
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
            ';
            })
            ->addColumn('status', function ($teacher) {
                return $teacher->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $teacher->status . '</span>'
                    : '<span class="badge bg-danger">' . $teacher->status . '</span>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
