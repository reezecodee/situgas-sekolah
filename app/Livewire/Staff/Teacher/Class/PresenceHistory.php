<?php

namespace App\Livewire\Staff\Teacher\Class;

use App\Exports\PresenceExport;
use App\Models\PresenceStudent;
use App\Models\PresenceTeacher;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class PresenceHistory extends Component
{
    #[Title('Riwayat Presensi')]
    #[Layout('components.layouts.staff')]

    public $id;
    public $classId;

    public function mount($id, $classId)
    {
        $this->id = $id;
        $this->classId = $classId;
    }

    public function downloadExcel($id)
    {
        $presenceTeacher = PresenceTeacher::findOrFail($id); 
        $students = Student::where('kelas_id', $presenceTeacher->kelas_id)
            ->orderBy('nama', 'asc')
            ->get();

        $data = $students->map(function ($student) use ($presenceTeacher) {
            $presenceStatus = PresenceStudent::where('absen_guru_id', $presenceTeacher->id)
                ->where('siswa_id', $student->id)
                ->first();

            return [
                'nama_siswa' => $student->nama,
                'status_presensi' => $presenceStatus ? $presenceStatus->status_kehadiran : 'Belum di absen',
                'tanggal_absensi' => $presenceStatus ? $presenceStatus->tanggal : 'Tidak Tersedia',
            ];
        });

        return Excel::download(new PresenceExport($data, $id), 'presence.xlsx');
    }

    public function render()
    {
        $title = 'Riwayat Presensi';

        return view('livewire.staff.teacher.class.presence-history', compact('title'));
    }
}
