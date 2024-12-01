<?php

namespace App\Livewire\Staff\Admin\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Setting extends Component
{
    #[Title('Pengaturan Aplikasi')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Pengaturan Aplikasi';

        return view('livewire.staff.admin.app.setting', compact('title'));
    }
}
