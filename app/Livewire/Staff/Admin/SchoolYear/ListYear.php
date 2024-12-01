<?php

namespace App\Livewire\Staff\Admin\SchoolYear;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListYear extends Component
{
    #[Title('Daftar Tahun Ajaran')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Tahun Ajaran';

        return view('livewire.staff.admin.school-year.list-year', compact('title'));
    }
}
