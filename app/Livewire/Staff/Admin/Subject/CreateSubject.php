<?php

namespace App\Livewire\Staff\Admin\Subject;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateSubject extends Component
{
    #[Title('Tambah Mata Pelajaran')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Tambah Mata Pelajaran';

        return view('livewire.staff.admin.subject.create-subject', compact('title'));
    }
}
