<?php

namespace App\Livewire\Staff\Admin\Schedule;

use App\Models\Classrooms;
use App\Models\Subject;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateSchedule extends Component
{
    #[Title('Jadwal Mengajar Guru')]
    #[Layout('components.layouts.staff')]

    public $subclasses;
    public $subjects;

    public function mount($level) 
    {
        $this->subclasses = Classrooms::where('tingkat', $level)->get();
        $this->subjects = Subject::where('tingkatan', $level)->get();
    }

    public function render()
    {
        return view('livewire.staff.admin.schedule.create-schedule');
    }
}
