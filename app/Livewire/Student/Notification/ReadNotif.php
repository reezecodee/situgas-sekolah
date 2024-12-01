<?php

namespace App\Livewire\Student\Notification;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ReadNotif extends Component
{
    #[Title('Baca Notifikasi')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Baca Notifikasi';
        return view('livewire.student.notification.read-notif', compact('title'));
    }
}
