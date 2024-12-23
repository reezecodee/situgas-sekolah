<?php

namespace App\Livewire\Staff\Admin\Schedule;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TeachingSchedule extends Component
{
    #[Title('Jadwal Mengajar Guru')]
    #[Layout('components.layouts.staff')]
    
    public function render()
    {
        $title = 'Jadwal Mengajar Guru';

        return view('livewire.staff.admin.schedule.teaching-schedule', compact('title'));
    }
}
