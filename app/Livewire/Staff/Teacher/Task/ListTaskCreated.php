<?php

namespace App\Livewire\Staff\Teacher\Task;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ListTaskCreated extends Component
{
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Tugas Yang Sudah Dibuat';

        return view('livewire.staff.teacher.task.list-task-created', compact('title'))->title($title);
    }
}
