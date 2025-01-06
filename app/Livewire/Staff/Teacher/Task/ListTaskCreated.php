<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Exports\SubmissionExport;
use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ListTaskCreated extends Component
{
    #[Layout('components.layouts.staff')]

    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function downloadExcel($id)
    {
        return Excel::download(new SubmissionExport($id), 'submissions.xlsx');
    }

    public function render()
    {
        $teachingSchedule = TeachingSchedule::with('classroom')->findOrFail($this->id);
        $title = "Daftar Tugas Yang Sudah Dibuat Untuk Kelas {$teachingSchedule->classroom->tingkat} {$teachingSchedule->classroom->nama}";

        return view('livewire.staff.teacher.task.list-task-created', compact('title'))->title($title);
    }
}
