<?php

namespace App\Livewire\Staff\Admin\Schedule;

use App\Models\Classrooms;
use App\Models\SchoolYear;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ClassList extends Component
{
    #[Title('Jadwal Mengajar Guru')]
    #[Layout('components.layouts.staff')]

    public $teachers;
    public $classes;
    public $schedules;
    public $guru_id;

    public function mount()
    {
        $this->teachers = Teacher::where('status', 'Aktif')->get();
    }
    
    public function checkSchedule()
    {
        $data = $this->validate([
            'guru_id' => 'required|exists:teachers,id'
        ]);

        $dayList = [
            'Senin' => 1,
            'Selasa' => 2,
            'Rabu' => 3,
            'Kamis' => 4,
            'Jumat' => 5,
            'Sabtu' => 6,
            'Minggu' => 7
        ];

        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $this->schedules = TeachingSchedule::with(['subjectTeacher.subject', 'classroom'])->where('tahun_ajaran_id', $schoolYear->id)->where('guru_id', $data['guru_id'])->get()
        ->sortBy(function($schedules) use ($dayList) {
            return $dayList[$schedules->hari];
        });

        if ($this->schedules->isEmpty()) {
            session()->flash('message', 'Tidak ada jadwal untuk guru ini pada tahun ajaran aktif.');
        }
    }

    public function render()
    {
        $title = 'Jadwal Mengajar Guru';
        $this->classes = Classrooms::select('tingkat')
        ->distinct()
        ->orderByRaw("FIELD(tingkat, 'VII', 'VIII', 'IX')")
        ->get();

        return view('livewire.staff.admin.schedule.teaching-schedule', compact('title'));
    }
}
