<?php

namespace App\Livewire\Student\Activities\Assignment;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Assignment extends Component
{
    #[Title('Daftar Tugas Siswa')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Daftar Tugas Siswa';

        return view('livewire.student.activities.assignment.assignment', compact('title'));
    }
}
