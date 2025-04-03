<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowDetailStudent extends Component
{
    #[Layout('components.layouts.staff')]

    public $classId;

    public function mount($classId)
    {
        $this->classId = $classId;
    }

    public function render()
    {
        $student = Student::with(['user', 'classroom'])->findOrFail($this->classId);
        $title = "Detail Siswa {$student->nama}";

        return view('livewire.staff.admin.class.show-detail-student', compact('student'))->title($title);
    }
}
