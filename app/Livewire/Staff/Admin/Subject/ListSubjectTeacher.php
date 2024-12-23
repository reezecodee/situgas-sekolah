<?php

namespace App\Livewire\Staff\Admin\Subject;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListSubjectTeacher extends Component
{
    #[Title('Daftar Guru Pengampu')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Guru Pengampu';

        return view('livewire.staff.admin.subject.list-subject-teacher', compact('title'));
    }
}
