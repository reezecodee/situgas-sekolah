<?php

namespace App\Livewire\Staff\Teacher\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EnterClass extends Component
{
    #[Title('Masuk Kelas')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Masuk Kelas';

        return view('livewire.staff.teacher.class.enter-class', compact('title'));
    }
}
