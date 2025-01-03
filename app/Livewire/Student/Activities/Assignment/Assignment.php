<?php

namespace App\Livewire\Student\Activities\Assignment;

use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Assignment extends Component
{
    #[Title('Daftar Tugas Siswa')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Daftar Tugas Siswa';
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $student = Student::where('user_id', Auth::user()->id)->first();
        $teachingSchedules = TeachingSchedule::where('tahun_ajaran_id', $schoolYear->id)
            ->where('kelas_id', $student->kelas_id)
            ->with(['assignment.submission' => function ($query) use ($student) {
                $query->where('siswa_id', $student->id);
            }, 'subjectTeacher'])
            ->get();

        foreach ($teachingSchedules as $schedule) {
            $schedule->totalAssignments = $schedule->assignment->count();

            $schedule->totalCompletedAssignments = $schedule->assignment->sum(function ($assignment) use ($student) {
                return $assignment->submission->where('siswa_id', $student->id)->count();
            });
        }


        return view('livewire.student.activities.assignment.assignment', compact('title', 'teachingSchedules'));
    }
}
