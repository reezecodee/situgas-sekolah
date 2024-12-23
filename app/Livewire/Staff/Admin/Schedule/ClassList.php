<?php

namespace App\Livewire\Staff\Admin\Schedule;

use App\Models\Classrooms;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ClassList extends Component
{
    #[Title('Jadwal Mengajar Guru')]
    #[Layout('components.layouts.staff')]

    public $classes;

    public function mount(){
        $this->classes = Classrooms::select('tingkat')
        ->distinct()
        ->orderByRaw("FIELD(tingkat, 'VII', 'VIII', 'IX')")
        ->get();
    }
    
    public function render()
    {
        $title = 'Jadwal Mengajar Guru';

        return view('livewire.staff.admin.schedule.teaching-schedule', compact('title'));
    }
}
