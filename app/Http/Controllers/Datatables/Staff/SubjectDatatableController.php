<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubjectDatatableController extends Controller
{
    public function getSubject(){
        $subjects = collect([
            (object) ['id' => 1, 'mapel' => 'Matematika', 'tingkat' => 'VI', 'status' => 'Aktif'],
            (object) ['id' => 2, 'mapel' => 'Bahasa Inggris', 'tingkat' => 'VI', 'status' => 'Tidak Aktif'],
            (object) ['id' => 3, 'mapel' => 'IPA', 'tingkat' => 'VI', 'status' => 'Aktif'],
            (object) ['id' => 4, 'mapel' => 'IPS', 'tingkat' => 'VI', 'status' => 'Aktif'],
        ]);

        // Datatables processing
        return DataTables::of($subjects)
            ->addColumn('action', function ($subject) {
                return '
                    <a wire:navigate href="' . route('subject.edit', $subject->id) . '" class="btn btn-sm btn-primary">Edit</a>
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
