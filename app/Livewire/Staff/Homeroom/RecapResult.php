<?php

namespace App\Livewire\Staff\Homeroom;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class RecapResult extends Component
{
    #[Title('Rekap Nilai')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Rekap Nilai';

        return view('livewire.staff.homeroom.recap-result', compact('title'));
    }
}
