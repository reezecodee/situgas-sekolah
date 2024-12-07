<?php

namespace App\Livewire\Components;

use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Component;

class ReportModal extends Component
{
    public $studentId;
    public $student;

    #[On('show-modal')]
    public function showModal($id)  // Ubah dari $studentId ke $id
    {
        $this->studentId = $id;
        $this->student = Student::find($id);
    }

    public function closeModal()
    {
        $this->student = null;  // Reset data siswa
    }

    public function render()
    {
        return view('livewire.components.report-modal');
    }
}
