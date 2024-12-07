<?php

namespace App\Livewire\Staff\Teacher\Result;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class StudyResult extends Component
{
    #[Title('Kirim Hasil Studi')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Kirim Hasil Studi';

        return view('livewire.staff.teacher.result.study-result', compact('title'));
    }
}
