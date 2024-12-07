<?php

namespace App\Livewire\Staff\Teacher\Task;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EvaluationTask extends Component
{
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Evaluasi Pengerjaan Tugas';

        return view('livewire.staff.teacher.task.evaluation-task', compact('title'))->title($title);
    }
}
