<?php

namespace App\Livewire\Student\Notification;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Notification extends Component
{
    #[Title('Notifikasi')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Notifikasi';

        return view('livewire.student.notification.notification', compact('title'));
    }
}
