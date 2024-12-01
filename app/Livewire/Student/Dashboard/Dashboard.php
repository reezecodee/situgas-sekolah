<?php

namespace App\Livewire\Student\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard test')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Dashboard Siswa';
        return view('livewire.student.dashboard.dashboard', compact('title'));
    }
}
