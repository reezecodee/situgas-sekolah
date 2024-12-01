<?php

namespace App\Livewire\Staff\Homeroom;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Letter extends Component
{
    #[Title('Buat Surat')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Buat Surat';

        return view('livewire.staff.homeroom.letter', compact('title'));
    }
}
