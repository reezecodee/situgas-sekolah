<?php

namespace App\Livewire\Staff\Admin\Letter;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class LetterIndex extends Component
{
    #[Title('Buat Surat')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Buat Surat';

        return view('livewire.staff.admin.letter.letter-index', compact('title'));
    }
}
