<?php

namespace App\Livewire\Staff\Teacher\Materi;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListMateri extends Component
{
    #[Title('Daftar Materi')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Materi';

        return view('livewire.staff.teacher.materi.list-materi', compact('title'));
    }
}
