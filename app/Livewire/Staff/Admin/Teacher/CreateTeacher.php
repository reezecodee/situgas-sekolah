<?php

namespace App\Livewire\Staff\Admin\Teacher;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateTeacher extends Component
{
    #[Title('Tambah Guru')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Tambah Guru';

        return view('livewire.staff.admin.teacher.create-teacher', compact('title'));
    }
}
