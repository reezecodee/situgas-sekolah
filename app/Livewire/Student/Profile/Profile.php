<?php

namespace App\Livewire\Student\Profile;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Profile Saya')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Profile Saya';

        return view('livewire.student.profile.profile', compact('title'));
    }
}
