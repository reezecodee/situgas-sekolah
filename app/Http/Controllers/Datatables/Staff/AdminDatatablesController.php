<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminDatatablesController extends Controller
{
    public function getAdmin()
    {
        $admins = Admin::with('user');

        return DataTables::of($admins)
            ->addIndexColumn()
            ->addColumn('action', function ($admin) {
                return '
                <a wire:navigate href="" class="btn btn-sm btn-danger">Hapus</a>
            ';
            })
            ->addColumn('email', function($admin){
                return $admin->user->email;
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
