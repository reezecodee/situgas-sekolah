<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\Classrooms;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DetailClass extends Component
{
    #[Layout('components.layouts.staff')]

    public $classId, $classLevel, $students;

    public function mount($classLevel, $classId){
        $this->classLevel = $classLevel;
        $this->classId = $classId;
        $this->students = Student::where('kelas_id', $classId)->where('status', 'Belum lulus')->get();
    }

    public function render()
    {
        $class = Classrooms::findOrFail($this->classId);
        $title = "Detail Kelas {$class->tingkat} {$class->nama}";

        return view('livewire.staff.admin.class.detail-class', compact('title'))->title($title);
    }
}
