<?php

namespace App\Livewire\Staff\Teacher\Task;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UploadTask extends Component
{
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Upload Tugas Untuk Kelas VII C';

        return view('livewire.staff.teacher.task.upload-task', compact('title'))->title($title);
    }
}
