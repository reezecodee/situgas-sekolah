<?php

namespace App\Livewire\Staff\Teacher\Result;

use Livewire\Attributes\Layout;
use Livewire\Component;

class SendStudyResult extends Component
{
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Kirim Hasil Studi Budi Budiman';

        return view('livewire.staff.teacher.result.send-study-result', compact('title'))->title($title);
    }
}
