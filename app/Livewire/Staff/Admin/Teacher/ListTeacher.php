<?php

namespace App\Livewire\Staff\Admin\Teacher;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListTeacher extends Component
{
    #[Title('Daftar Guru')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Guru';

        return view('livewire.staff.admin.teacher.list-teacher', compact('title'));
    }
}
