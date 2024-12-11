<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Models\SchoolYear;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListTask extends Component
{
    #[Title('Daftar Tugas')]
    #[Layout('components.layouts.staff')]

    public $teacher;

    public function mount()
    {
        $this->teacher = Teacher::where('user_id', Auth::user()->id)->first();
    }

    public function render()
    {
        $title = 'Daftar Tugas';
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
            $tasks = TeachingSchedule::withCount(['assignment' => function ($query) use ($schoolYear) {
                $query->where('tahun_ajaran_id', $schoolYear->id);
            }])
            ->where('tahun_ajaran_id', $schoolYear->id)
            ->where('guru_id', $this->teacher->id)
            ->get();


        return view('livewire.staff.teacher.task.list-task', compact('title', 'tasks'));
    }
}
