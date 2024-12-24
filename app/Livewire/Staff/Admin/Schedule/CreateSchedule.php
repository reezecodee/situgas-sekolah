<?php

namespace App\Livewire\Staff\Admin\Schedule;

use App\Models\Classrooms;
use App\Models\SchoolYear;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateSchedule extends Component
{
    #[Title('Jadwal Mengajar Guru')]
    #[Layout('components.layouts.staff')]

    public $subclasses;
    public $subjects;

    public $hari;
    public $mapel_id;
    public $jam_masuk;
    public $jam_keluar;
    public $kelas_id;

    public function mount($level) 
    {
        $this->subclasses = Classrooms::where('tingkat', $level)->get();
        $this->subjects = Subject::where('tingkatan', $level)->get();
    }

    public function checkSchedule()
    {
        $hari = $this->hari;
        $mapel_id = $this->mapel_id;
        $jam_masuk = $this->jam_masuk;
        $jam_keluar = $this->jam_keluar;
        $kelas_id = $this->kelas_id;

        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $subject = Subject::find($mapel_id);

        if(!$subject){
            return collect();
        }
    
        $subjectTeachers = SubjectTeacher::with(['teachingSchedule' => function ($query) use ($hari, $jam_masuk, $jam_keluar, $kelas_id, $schoolYear) {
            $query->where('tahun_ajaran_id', $schoolYear->id)
                ->where('hari', $hari)
                ->where('kelas_id', $kelas_id)
                ->where(function ($q) use ($jam_masuk, $jam_keluar) {
                    $q->whereBetween('jam_masuk', [$jam_masuk, $jam_keluar])
                        ->orWhereBetween('jam_keluar', [$jam_masuk, $jam_keluar])
                        ->orWhere(function ($subQuery) use ($jam_masuk, $jam_keluar) {
                            $subQuery->where('jam_masuk', '<=', $jam_masuk)
                                ->where('jam_keluar', '>=', $jam_keluar);
                        });
                });
        }])->where('mapel_id', $mapel_id)
            ->get();

        return $subjectTeachers;
    }

    public function render()
    {
        return view('livewire.staff.admin.schedule.create-schedule');
    }
}
