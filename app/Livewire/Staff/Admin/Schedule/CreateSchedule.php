<?php

namespace App\Livewire\Staff\Admin\Schedule;

use App\Models\Classrooms;
use App\Models\SchoolYear;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateSchedule extends Component
{
    #[Title('Jadwal Mengajar Guru')]
    #[Layout('components.layouts.staff')]

    public $subclasses;
    public $subjects;
    public $schoolYear;

    public $hari;
    public $mapel_id;
    public $jam_masuk;
    public $jam_keluar;
    public $kelas_id;
    public $jam_istirahat_masuk = null;
    public $jam_istirahat_keluar = null;

    public $pengampu_id;

    public function rules()
    {
        return [
            'pengampu_id' => 'required|exists:subject_teachers,id'
        ];
    }


    public function mount($level)
    {
        $this->subclasses = Classrooms::where('tingkat', $level)->get();
        $this->subjects = Subject::where('tingkatan', $level)->get();
        $this->schoolYear = SchoolYear::where('status', 'Aktif')->first();
    }

    public function checkSchedule()
    {
        $hari = $this->hari;
        $mapel_id = $this->mapel_id;
        $jam_masuk = $this->jam_masuk;
        $jam_keluar = $this->jam_keluar;
        $kelas_id = $this->kelas_id;

        $schoolYear = $this->schoolYear;
        $subject = Subject::find($mapel_id);

        if (!$subject) {
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

    public function submit() 
    {
        $data = $this->validate();
        $subjectTeacher = SubjectTeacher::find($data['pengampu_id']);

        TeachingSchedule::create([
            'tahun_ajaran_id' => $this->schoolYear,
            'pengampu_id' => $data['pengampu_id'],
            'guru_id' => $subjectTeacher->guru_id,
            'kelas_id' => $this->kelas_id,
            'hari' => $this->hari,
            'jam_masuk' => $this->jam_masuk,
            'jam_keluar' => $this->jam_keluar,
            'jam_istirahat_masuk' => $this->jam_istirahat_masuk,
            'jam_istirahat_keluar' => $this->jam_istirahat_keluar,
        ]);

        
    }

    public function render()
    {
        return view('livewire.staff.admin.schedule.create-schedule');
    }
}
