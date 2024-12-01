<?php

namespace App\Livewire\Student\Academics\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MyClass extends Component
{
    #[Title('Kelas Saya')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Kelas Saya';

        return view('livewire.student.academics.class.my-class', compact('title'));
    }
}
