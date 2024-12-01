<?php

namespace App\Livewire\Staff\Admin\Calendar;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Calendar extends Component
{
    #[Title('Kalender Akademik')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Kalender Akademik';

        return view('livewire.staff.admin.calendar.calendar', compact('title'));
    }
}
