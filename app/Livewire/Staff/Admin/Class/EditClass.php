<?php

namespace App\Livewire\Staff\Admin\Class;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditClass extends Component
{
    #[Title('Edit Kelas VI')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Edit Kelas VI';
        
        return view('livewire.staff.admin.class.edit-class');
    }
}
