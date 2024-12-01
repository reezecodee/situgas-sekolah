<?php

namespace App\Livewire\Student\Academics\Schedule;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Schedule extends Component
{
    #[Title('Jadwal Pelajaran')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Jadwal Pelajaran';

        return view('livewire.student.academics.schedule.schedule', compact('title'));
    }
}
