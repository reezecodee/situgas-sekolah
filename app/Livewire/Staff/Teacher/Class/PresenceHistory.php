<?php

namespace App\Livewire\Staff\Teacher\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PresenceHistory extends Component
{
    #[Title('Riwayat Presensi')]
    #[Layout('components.layouts.staff')]

    public $id;

    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        $title = 'Riwayat Presensi';

        return view('livewire.staff.teacher.class.presence-history', compact('title'));
    }
}
