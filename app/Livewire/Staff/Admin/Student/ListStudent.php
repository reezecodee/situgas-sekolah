<?php

namespace App\Livewire\Staff\Admin\Student;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListStudent extends Component
{
    #[Title('Daftar Siswa')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Siswa';

        return view('livewire.staff.admin.student.list-student', compact('title'));
    }
}
