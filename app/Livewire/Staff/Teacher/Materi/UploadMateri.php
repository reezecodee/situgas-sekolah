<?php

namespace App\Livewire\Staff\Teacher\Materi;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UploadMateri extends Component
{
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Upload Materi Tambahan Matematika';
        return view('livewire.staff.teacher.materi.upload-materi', compact('title'))->title($title);
    }
}
