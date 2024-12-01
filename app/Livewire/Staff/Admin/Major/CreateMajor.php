<?php

namespace App\Livewire\Staff\Admin\Major;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateMajor extends Component
{
    #[Title('Buat Program Studi Baru')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Buat Program Studi Baru';

        return view('livewire.staff.admin.major.create-major', compact('title'));
    }
}
