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
            ->withCount('students')
            ->orderBy('nama', 'asc')
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($subkelas) use ($class) {
                $editRoute = route('class.edit', ['id' => $subkelas->id, 'class' => $class]);
                $detailRoute = route('class.detail', ['id' => $subkelas->id, 'class' => $class]);

                $deleteButton = '';
                if ($subkelas->students_count === 0) {
                    $deleteButton = '
                        <form action="' . route('class.delete', ['id' => $subkelas->id]) . '" method="POST" style="display:inline;" id="form-'. $subkelas->id .'">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="button" class="btn btn-sm btn-danger" onclick="submitForm(\'form-'. $subkelas->id .'\')">Hapus</button>
                        </form>
                    ';
                } else {
                    $deleteButton = '<span class="text-muted">Tidak bisa dihapus</span>';
                }

                return '
                <div class="d-flex gap-1">
                <a wire:navigate href="' . $editRoute . '" class="btn btn-sm btn-primary">Edit</a>
                ' . $deleteButton . '
                <a wire:navigate href="' . $detailRoute . '" class="btn btn-sm btn-success">Detail</a>
                </div>
            ';
            })
            ->addColumn('total_students', function ($subkelas) {
                return $subkelas->students_count; // Menampilkan jumlah siswa
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
