<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CalendarDatatableController extends Controller
{
    public function getCalendar()
    {
        $calendars = Calendar::latest();

        return DataTables::of($calendars)
            ->addIndexColumn()
            ->addColumn('keterangan', function ($calendar) {
                if($calendar->keterangan === 'Libur'){
                    return '<span class="badge bg-danger">'. $calendar->keterangan .'</span>';
                }else if($calendar->keterangan === 'Kegiatan'){
                    return '<span class="badge bg-success">'. $calendar->keterangan .'</span>';
                }else{
                    return '<span class="badge bg-primary">'. $calendar->keterangan .'</span>';
                }
            })
            ->addColumn('action', function ($calendar) {
                $deleteForm = '
                    <form action="' . route('calendar.delete', ['id' => $calendar->id]) . '" method="POST" style="display:inline;" id="form-' . $calendar->id . '">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="button" class="btn btn-sm btn-danger" onclick="submitForm(\'form-' . $calendar->id . '\')">Hapus</button>
                    </form>
                ';

                return $deleteForm;
            })
            ->rawColumns(['action', 'keterangan'])
            ->make(true);
    }
}
