<?php

namespace App\Livewire\Staff\Homeroom;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ManageIntern extends Component
{
    #[Title('Manajemen PKL')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Manajemen PKL';

        return view('livewire.staff.homeroom.manage-intern', compact('title'));
    }
}
