<?php

namespace App\Livewire\Staff\Profile;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Profile Saya')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Profile Saya';

        return view('livewire.staff.profile.profile', compact('title'));
    }
}
