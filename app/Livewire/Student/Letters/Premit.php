<?php

namespace App\Livewire\Student\Letters;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Premit extends Component
{
    #[Title('Surat Izin Kehadiran')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Surat Izin Kehadiran';

        return view('livewire.student.letters.premit', compact('title'));
    }
}
