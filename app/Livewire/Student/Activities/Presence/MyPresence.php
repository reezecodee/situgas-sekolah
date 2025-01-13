<?php

namespace App\Livewire\Student\Activities\Presence;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MyPresence extends Component
{
    #[Title('Absensi Saya')]
    #[Layout('components.layouts.student')]

    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    
    public function render()
    {
        $title = "Absensi Saya";

        return view('livewire.student.activities.presence.my-presence', compact('title'));
    }
}
