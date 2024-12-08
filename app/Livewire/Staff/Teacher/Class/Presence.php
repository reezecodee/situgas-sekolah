<?php

namespace App\Livewire\Staff\Teacher\Class;

use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Presence extends Component
{
    #[Title('Presensi Mata Pelajaran Matematika Kelas VII C')]
    #[Layout('components.layouts.staff')]

    

    public $presence;

    public function mount($id)
    {
        $this->presence = TeachingSchedule::with(['subjectTeacher', 'classroom'])->findOrFail($id);
    }

    public function render()
    {
        $title = 'Presensi Mata Pelajaran Matematika Kelas VII C';

        return view('livewire.staff.teacher.class.presence', compact('title'));
    }
}
