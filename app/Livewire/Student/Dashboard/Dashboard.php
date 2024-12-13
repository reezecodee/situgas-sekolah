<?php

namespace App\Livewire\Student\Dashboard;

use App\Models\Classrooms;
use App\Models\Student;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard Siswa')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $totalAssignments = TeachingSchedule::with(['subjectTeacher.subject', 'assignment'])
            ->get()
            ->groupBy('subjectTeacher.subject.id')
            ->map(function ($grouped) {
                $subject = $grouped->first()->subjectTeacher->subject;
                return [
                    'mapel' => $subject->nama,
                    'total_tugas' => $grouped->pluck('assignment')->flatten()->count(),
                ];
            })
            ->values();

        $student = Student::where('user_id', Auth::user()->id)->first();
        $class = Classrooms::with('teacher')->where('id', $student->kelas_id)->first();

        $title = 'Dashboard Siswa';
        return view('livewire.student.dashboard.dashboard', compact('title', 'totalAssignments', 'class'));
    }
}
