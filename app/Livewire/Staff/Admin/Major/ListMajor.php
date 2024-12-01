<?php

namespace App\Livewire\Staff\Admin\Major;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListMajor extends Component
{
    #[Title('Daftar Program Studi')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Program Studi';

        return view('livewire.staff.admin.major.list-major', compact('title'));
    }
}
