<?php

namespace App\Livewire\Staff\Admin\Student;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateStudent extends Component
{
    #[Title('Tambah Siswa')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Tambah Siswa';

        return view('livewire.staff.admin.student.create-student', compact('title'));
    }
}
