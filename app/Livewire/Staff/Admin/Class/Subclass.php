<?php

namespace App\Livewire\Staff\Admin\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Subclass extends Component
{
    #[Title('Daftar Subkelas VI')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Subkelas VI';

        return view('livewire.staff.admin.class.subclass', compact('title'));
    }
}
