<?php

namespace App\Livewire\Student\Academics\Schedule;

use App\Models\Student;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Schedule extends Component
{
    #[Title('Jadwal Pelajaran')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Jadwal Pelajaran';
        $student = Student::where('user_id', Auth::user()->id)->first();
        $schedules = TeachingSchedule::with(['subjectTeacher.teacher', 'subjectTeacher.subject'])
        ->where('kelas_id', $student->kelas_id)
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

        return view('livewire.student.academics.schedule.schedule', compact('title', 'groupedSchedules', 'backgroundClasses'));
    }
}
