<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Classrooms;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubclassDatatablesController extends Controller
{
    public function getSubclass()
    {
        $subclasses = collect([
            (object) ['id' => 1, 'name' => 'Kelas A', 'total_students' => 25, 'status' => 'Aktif'],
            (object) ['id' => 2, 'name' => 'Kelas B', 'total_students' => 30, 'status' => 'Tidak Aktif'],
            (object) ['id' => 3, 'name' => 'Kelas C', 'total_students' => 20, 'status' => 'Aktif'],
        ]);

        return DataTables::of($subclasses)
            ->addColumn('action', function ($subkelas) {
                return '
                <a wire:navigate href="' . route('class.edit', $subkelas->id) . '" class="btn btn-sm btn-primary">Edit</a>
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
                <a wire:navigate href="' . route('class.detail', $subkelas->id) . '" class="btn btn-sm btn-success">Detail</a>
            ';
            })
            ->addColumn('status', function ($subkelas) {
                return $subkelas->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $subkelas->status . '</span>'
                    : '<span class="badge bg-danger">' . $subkelas->status . '</span>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
