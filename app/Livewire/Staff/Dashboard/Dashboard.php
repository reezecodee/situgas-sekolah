<?php

namespace App\Livewire\Staff\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard Staff')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Dashboard Staff';

        return view('livewire.staff.dashboard.dashboard', compact('title'));
    }
}
