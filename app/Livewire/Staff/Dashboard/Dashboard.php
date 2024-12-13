<?php

namespace App\Livewire\Staff\Dashboard;

use App\Models\Admin;
use App\Models\Assignment;
use App\Models\Classrooms;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard Staff')]
    #[Layout('components.layouts.staff')]

    public $countOfAdmin;
    public $countOfTeacher;
    public $countOfStudent;

    public $countOfMateri;
    public $countOfSchedule;
    public $countOfTask;

    public function mount()
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $teachingSchedule = TeachingSchedule::where('tahun_ajaran_id', $schoolYear->id)->where('guru_id', $teacher->id)->count();
        $task = Assignment::where('tahun_ajaran_id', $schoolYear->id)->where('guru_id', $teacher->id)->count();

        $this->countOfAdmin = Admin::count();
        $this->countOfTeacher = Teacher::count();
        $this->countOfStudent = Student::count();

        $this->countOfMateri = $teacher->subjectTeacher()
        ->withCount('materi')
        ->get()
        ->sum('materi_count');
        $this->countOfSchedule = $teachingSchedule;
        $this->countOfTask = $task;
    }

    public function render()
    {
        $title = 'Dashboard Staff';

        return view('livewire.staff.dashboard.dashboard', compact('title'));
    }
}
