<?php

namespace App\Livewire\Staff\Teacher\Class;

use App\Models\SchoolYear;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EnterClass extends Component
{
    #[Title('Masuk Kelas')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Masuk Kelas';
        $teacher = Teacher::with('user')->where('user_id', Auth::user()->id)->first();

        $schoolYear = SchoolYear::where('status', 'Aktif')->first();

        $teachingSchedules = TeachingSchedule::with(['schoolYear', 'teacher', 'classroom', 'subjectTeacher', 'classroom.students'])
            ->where('tahun_ajaran_id', $schoolYear->id)
            ->where('guru_id', $teacher->id)
            ->get();

        return view('livewire.staff.teacher.class.enter-class', compact('title', 'teachingSchedules'));
    }
}
