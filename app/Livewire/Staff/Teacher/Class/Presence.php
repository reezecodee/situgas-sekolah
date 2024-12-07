<?php

namespace App\Livewire\Staff\Teacher\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Presence extends Component
{
    #[Title('Presensi Mata Pelajaran Matematika Kelas VII C')]
    #[Layout('components.layouts.staff')]


    public function render()
    {
        $title = 'Presensi Mata Pelajaran Matematika Kelas VII C';

        return view('livewire.staff.teacher.class.presence', compact('title'));
    }
}
