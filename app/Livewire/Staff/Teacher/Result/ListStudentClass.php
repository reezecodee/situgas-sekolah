<?php

namespace App\Livewire\Staff\Teacher\Result;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ListStudentClass extends Component
{
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Siswa Kelas VI C';

        return view('livewire.staff.teacher.result.list-student-class', compact('title'))->title($title);
    }
}
