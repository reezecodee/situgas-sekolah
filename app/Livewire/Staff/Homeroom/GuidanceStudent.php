<?php

namespace App\Livewire\Staff\Homeroom;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GuidanceStudent extends Component
{
    #[Title('Murid Bimbingan')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Murid Bimbingan';

        return view('livewire.staff.homeroom.guidance-student', compact('title'));
    }
}
