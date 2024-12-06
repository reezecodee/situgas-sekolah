<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function delete($id)
    {
        $calendar = Calendar::findOrFail($id);
        $calendar->delete();

        return back()->with('success', 'Jadwal kegiatan berhasil dihapus.');
    }

    public function getSchedule()
    {
        $schedules = Calendar::whereYear('created_at', date('Y'))->get();

        $formattedSchedules = $schedules->map(function ($schedule) {
            return [
                'id' => $schedule->id,
                'title' => $schedule->judul,
                'start' => $schedule->tgl_mulai,
                'end' => $schedule->tgl_selesai,
                'description' => $schedule->keterangan,
            ];
        });

        return response()->json($formattedSchedules);
    }
}
