<?php

namespace App\Livewire\Staff\Admin\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListClass extends Component
{
    #[Title('Daftar Kelas')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Kelas';

        return view('livewire.staff.admin.class.list-class', compact('title'));
    }
}
