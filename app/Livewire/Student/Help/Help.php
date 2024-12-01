<?php

namespace App\Livewire\Student\Help;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Help extends Component
{
    #[Title('Bantuan')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Bantuan';

        return view('livewire.student.help.help', compact('title'));
    }
}
