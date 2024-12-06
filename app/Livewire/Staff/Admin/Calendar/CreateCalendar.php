<?php

namespace App\Livewire\Staff\Admin\Calendar;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCalendar extends Component
{
    #[Title('Buat Kalender Akademik')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Buat Kalender Akademik';

        return view('livewire.staff.admin.calendar.create-calendar')->title($title);
    }
}
