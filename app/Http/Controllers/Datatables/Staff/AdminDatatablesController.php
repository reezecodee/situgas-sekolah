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
            ->addColumn('email', function($admin){
                return $admin->user->email;
            })
            ->addColumn('status', function ($admin) {
                return $admin->status === 'Aktif'
                    ? '<span class="badge bg-success">' . $admin->status . '</span>'
                    : '<span class="badge bg-danger">' . $admin->status . '</span>';
            })
            ->addColumn('action', function ($admin) {
                if ($admin->status === 'Aktif') {
                    return '<span class="text-muted">Tidak bisa dihapus</span>';
                }

                $deleteForm = '
                    <form action="' . route('admin.delete', ['id' => $admin->id]) . '" method="POST" style="display:inline;" id="form-'. $admin->id .'">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="button" class="btn btn-sm btn-danger" onclick="submitForm(\'form-'. $admin->id .'\')">Hapus</button>
                    </form>
                ';

                return $deleteForm;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
