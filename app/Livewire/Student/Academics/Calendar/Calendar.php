<?php

namespace App\Livewire\Student\Academics\Calendar;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Calendar extends Component
{
    #[Title('Kalender Akademik')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Kalender Akademik';
        return view('livewire.student.academics.calendar.calendar', compact('title'));
    }
}
