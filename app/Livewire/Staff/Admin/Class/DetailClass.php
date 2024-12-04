<?php

namespace App\Livewire\Staff\Admin\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DetailClass extends Component
{
    #[Title('Detail Kelas VI')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Detail Kelas VI';

        return view('livewire.staff.admin.class.detail-class');
    }
}
