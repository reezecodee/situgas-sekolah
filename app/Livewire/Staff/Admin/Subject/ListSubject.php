<?php

namespace App\Livewire\Staff\Admin\Subject;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListSubject extends Component
{
    #[Title('Daftar Mata Pelajaran')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Mata Pelajaran';

        return view('livewire.staff.admin.subject.list-subject', compact('title'));
    }
}
