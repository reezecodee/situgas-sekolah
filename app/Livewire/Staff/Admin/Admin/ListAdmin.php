<?php

namespace App\Livewire\Staff\Admin\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListAdmin extends Component
{
    #[Title('Daftar Admin')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Admin';

        return view('livewire.staff.admin.admin.list-admin', compact('title'));
    }
}
