<?php

namespace App\Livewire\Staff\Admin\Subject;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditSubject extends Component
{
    #[Title('Edit Mata Pelajaran')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Edit Mata Pelajaran';

        return view('livewire.staff.admin.subject.edit-subject', compact('title'));
    }
}
