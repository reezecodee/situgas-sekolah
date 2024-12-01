<?php

namespace App\Livewire\Staff\Admin\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateClass extends Component
{
    #[Title('Buat Kelas Baru')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Buat Kelas Baru';

        return view('livewire.staff.admin.class.create-class', compact('title'));
    }
}
