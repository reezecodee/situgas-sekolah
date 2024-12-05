<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Classrooms;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubclassDatatablesController extends Controller
{
    public function getSubclass($class)
    {
        $data = Classrooms::where('tingkat', $class)
            ->withCount('students')->orderBy('nama', 'asc')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($subkelas) use ($class) {
                return '
                <a wire:navigate href="' . route('class.edit', ['id' => $subkelas->id, 'class' => $class]) . '" class="btn btn-sm btn-primary">Edit</a>
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
                <a wire:navigate href="' . route('class.detail', ['id' => $subkelas->id, 'class' => $class]) . '" class="btn btn-sm btn-success">Detail</a>
            ';
            })
            ->addColumn('total_students', function ($subkelas) {
                return $subkelas->students_count; // Mengambil jumlah siswa dari withCount
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
