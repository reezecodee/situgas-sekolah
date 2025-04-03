<?php

namespace App\Livewire\Student\Activities\Presence;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MyPresence extends Component
{
    #[Title('Absensi Saya')]
    #[Layout('components.layouts.student')]

    public $subjectTeacherId;

    public function mount($subjectTeacherId)
    {
        $this->subjectTeacherId = $subjectTeacherId;
    }
    
    public function render()
    {
        $title = "Absensi Saya";

        return view('livewire.student.activities.presence.my-presence', compact('title'));
    }
}
