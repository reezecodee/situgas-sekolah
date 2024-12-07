<?php

namespace App\Livewire\Staff\Homeroom;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AttitudeStudent extends Component
{
    #[Title('Nilai Sikap Siswa')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Nilai Sikap Siswa';

        return view('livewire.staff.homeroom.attitude-student', compact('title'));
    }
}
