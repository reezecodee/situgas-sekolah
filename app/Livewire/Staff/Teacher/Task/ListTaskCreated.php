<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ListTaskCreated extends Component
{
    #[Layout('components.layouts.staff')]

    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $teachingSchedule = TeachingSchedule::with('classroom')->findOrFail($this->id);
        $title = "Daftar Tugas Yang Sudah Dibuat Untuk Kelas {$teachingSchedule->classroom->tingkat} {$teachingSchedule->classroom->nama}";

        return view('livewire.staff.teacher.task.list-task-created', compact('title'))->title($title);
    }
}
