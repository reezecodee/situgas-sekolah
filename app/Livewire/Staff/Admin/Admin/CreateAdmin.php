<?php

namespace App\Livewire\Staff\Admin\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateAdmin extends Component
{
    #[Title('Tambah Admin')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Tambah Admin';

        return view('livewire.staff.admin.admin.create-admin', compact('title'));
    }
}
