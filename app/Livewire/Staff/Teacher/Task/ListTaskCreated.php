<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Exports\SubmissionExport;
use App\Models\Classrooms;
use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ListTaskCreated extends Component
{
    #[Layout('components.layouts.staff')]

    public $id;
    public $classId;

    public function mount($id, $classId)
    {
        $this->id = $id;
        $this->classId = $classId;
    }

    public function downloadExcel($id)
    {
        return Excel::download(new SubmissionExport($id), 'submissions.xlsx');
    }

    public function render()
    {
        $class = Classrooms::findOrFail($this->classId);
        $title = "Daftar Tugas Yang Sudah Dibuat Untuk Kelas {$class->tingkat} {$class->nama}";

        return view('livewire.staff.teacher.task.list-task-created', compact('title'))->title($title);
    }
}
