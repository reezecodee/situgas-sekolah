<?php

namespace App\Livewire\Student\Activities\Internship;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Internship extends Component
{
    #[Title('Kegiatan PKL')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Kegiatan PKL';

        return view('livewire.student.activities.internship.internship', compact('title'));
    }
}
