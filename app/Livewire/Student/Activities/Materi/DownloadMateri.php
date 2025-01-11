<?php

namespace App\Livewire\Student\Activities\Materi;

use App\Models\SubjectTeacher;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DownloadMateri extends Component
{
    #[Title('Daftar Materi')]
    #[Layout('components.layouts.student')]

    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    
    public function render()
    {
        $subjectTeacher = SubjectTeacher::with('subject')->findOrFail($this->id);
        $title = "Daftar Materi Mata Pelajaran {$subjectTeacher->subject->nama}";

        return view('livewire.student.activities.materi.download-materi', compact('title'));
    }
}
