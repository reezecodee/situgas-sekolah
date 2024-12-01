<?php

namespace App\Livewire\Student\Profile;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ChangePassword extends Component
{
    #[Title('Ganti Password')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Ganti Password';

        return view('livewire.student.profile.change-password', compact('title'));
    }
}
