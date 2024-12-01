<?php

namespace App\Livewire\Student\Profile;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DataPrivacy extends Component
{
    #[Title('Data Pribadi')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Data Pribadi';

        return view('livewire.student.profile.data-privacy', compact('title'));
    }
}
