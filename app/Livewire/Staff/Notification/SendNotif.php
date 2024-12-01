<?php

namespace App\Livewire\Staff\Notification;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SendNotif extends Component
{
    #[Title('Kirim Notifikasi')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Kirim Notifikasi';

        return view('livewire.staff.notification.send-notif', compact('title'));
    }
}
