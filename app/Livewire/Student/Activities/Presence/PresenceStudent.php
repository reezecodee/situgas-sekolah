<?php

namespace App\Livewire\Student\Activities\Presence;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PresenceStudent extends Component
{
    #[Title('Presensi Siswa')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Presensi Siswa';

        return view('livewire.student.activities.presence.presence-student', compact('title'));
    }
}
