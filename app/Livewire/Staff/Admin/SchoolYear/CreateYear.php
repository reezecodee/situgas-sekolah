<?php

namespace App\Livewire\Staff\Admin\SchoolYear;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateYear extends Component
{
    #[Title('Buat Tahun Ajaran Baru')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Buat Tahun Ajaran Baru';

        return view('livewire.staff.admin.school-year.create-year', compact('title'));
    }
}
