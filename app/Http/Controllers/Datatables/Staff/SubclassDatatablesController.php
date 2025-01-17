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
        ->withCount(['students as total_students' => function ($query) {
            $query->where('status', 'Belum lulus'); 
        }])
        ->orderBy('nama', 'asc')
        ->get();

    return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('status', function($subkelas){
            return $subkelas->status == 'Aktif' ? '<span class="badge bg-success">'.$subkelas->status.'</span>' : '<span class="badge bg-danger">'.$subkelas->status.'</span>';
        })
        ->addColumn('action', function ($subkelas) use ($class) {
            $editRoute = route('class.edit', ['id' => $subkelas->id, 'class' => $class]);
            $detailRoute = route('class.detail', ['id' => $subkelas->id, 'class' => $class]);
            $scheduleRoute = route('class.schedule', ['id' => $subkelas->id, 'class' => $class]);

            $deleteButton = '';
            if ($subkelas->total_students === 0) { // Gunakan total_students di sini
                $deleteButton = '
                    <form action="' . route('class.delete', ['id' => $subkelas->id]) . '" method="POST" style="display:inline;" id="form-'. $subkelas->id .'">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="button" class="btn btn-sm btn-danger" onclick="submitForm(\'form-'. $subkelas->id .'\')">Hapus</button>
                    </form>
                ';
            }

            return '
            <div class="d-flex gap-1">
            <a wire:navigate href="' . $editRoute . '" class="btn btn-sm btn-primary">Edit</a>
            ' . $deleteButton . '
            <a wire:navigate href="' . $detailRoute . '" class="btn btn-sm btn-success">Detail</a>
            <a wire:navigate href="' . $scheduleRoute . '" class="btn btn-sm btn-warning">Cek Jadwal Pelajaran</a>
            </div>
        ';
        })
        ->addColumn('total_students', function ($subkelas) {
            return $subkelas->total_students; 
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
}
