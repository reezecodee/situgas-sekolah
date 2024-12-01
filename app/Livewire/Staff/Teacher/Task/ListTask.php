<?php

namespace App\Livewire\Staff\Teacher\Task;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListTask extends Component
{
    #[Title('Daftar Tugas')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Tugas';

        return view('livewire.staff.teacher.task.list-task', compact('title'));
    }
}
