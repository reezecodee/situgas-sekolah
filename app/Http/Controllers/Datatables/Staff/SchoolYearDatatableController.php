<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SchoolYearDatatableController extends Controller
{
    public function getSchoolYear()
    {
        $schoolYears = SchoolYear::query();
        Carbon::setLocale('id');

        return DataTables::of($schoolYears)
            ->addColumn('action', function ($schoolYear) {
                return '
                <a wire:navigate href="' . route('year.edit', $schoolYear->id) . '" class="btn btn-sm btn-primary">Edit</a>
                 <a wire:navigate href="' . route('year.edit', $schoolYear->id) . '" class="btn btn-sm btn-danger">Hapus</a>
                ';
            })
            ->addColumn('tgl_mulai', function ($schoolYear) {
                return Carbon::parse($schoolYear->tgl_mulai)->translatedFormat('d F Y');
            })
            ->addColumn('tgl_selesai', function ($schoolYear) {
                return Carbon::parse($schoolYear->tgl_selesai)->translatedFormat('d F Y');
            })
            ->addColumn('status', function ($schoolYear) {
                $btnClass = $schoolYear->status === "Aktif" ? "success" : "danger";
                $id = $schoolYear->id;
                $status = $schoolYear->status;
                $routeName = 'dt.chStatusYear';
                return view('components.staff.dropdown.status', compact('btnClass', 'id', 'status', 'routeName'))->render();
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function changeStatus($id, $status)
    {
        $schoolYear = SchoolYear::findOrFail($id);

        if (!in_array($status, ['Aktif', 'Tidak aktif'])) {
            return back()->with('failed', 'Status tidak valid.');
        }

        if ($status === 'Aktif') {
            SchoolYear::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);
        }

        $schoolYear->status = $status;
        $schoolYear->save();

        return redirect()->to(route('year.list'))->with("success", "Berhasil memperbarui status tahun ajaran periode {$schoolYear->periode} ke {$status}.");
    }
}
