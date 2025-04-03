<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SubjectSchedule extends Component
{
    #[Title('Jadwal Pelajaran')]
    #[Layout('components.layouts.staff')]

    public $classLevel, $classId;

    public function mount($classLevel, $classId)
    {
        $this->classLevel = $classLevel;
        $this->classId = $classId;
    }
    
    public function render()
    {
        $schedules = TeachingSchedule::with(['subjectTeacher.teacher', 'subjectTeacher.subject'])
        ->where('kelas_id', $this->classId)
        ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")
        ->get();

        $groupedSchedules = $schedules->groupBy('hari');

        $backgroundClasses = [
            'Senin' => 'primary',
            'Selasa' => 'success',
            'Rabu' => 'danger',
            'Kamis' => 'warning',
            'Jumat' => 'info',
            'Sabtu' => 'secondary',
        ];

        return view('livewire.staff.admin.class.subject-schedule', compact('groupedSchedules', 'backgroundClasses'));
    }
}
