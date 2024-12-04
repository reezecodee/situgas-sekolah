<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminDatatablesController extends Controller
{
    public function getAdmin()
    {
        $admins = collect([
            (object) ['id' => 1, 'name' => 'Admin 1', 'telepon' => '081234567890', 'status' => 'Aktif'],
            (object) ['id' => 2, 'name' => 'Admin 2', 'telepon' => '081987654321', 'status' => 'Tidak Aktif'],
            (object) ['id' => 3, 'name' => 'Admin 3', 'telepon' => '081234876543', 'status' => 'Aktif'],
        ]);

        // Datatables processing
        return DataTables::of($admins)
            ->addColumn('action', function ($admin) {
                return '
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
            ';
            })
            ->addColumn('status', function ($admin) {
                return $admin->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $admin->status . '</span>'
                    : '<span class="badge bg-danger">' . $admin->status . '</span>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
