<?php

namespace App\Livewire\Student\Activities\Assignment;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListAssignment extends Component
{
    #[Layout('components.layouts.student')]
    #[Title('Daftar Tugas')]

    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $title = 'Daftar Tugas';
        return view('livewire.student.activities.assignment.list-assignment', compact('title'));
    }
}