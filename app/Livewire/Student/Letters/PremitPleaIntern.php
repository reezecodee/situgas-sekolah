<?php

namespace App\Livewire\Student\Letters;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PremitPleaIntern extends Component
{
    #[Title('Surat Permohonan PKL')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Surat Permohonan PKL';

        return view('livewire.student.letters.premit-plea-intern', compact('title'));
    }
}
