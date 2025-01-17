<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\Classrooms;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DetailClass extends Component
{
    #[Layout('components.layouts.staff')]

    public $class;
    public $id;
    public $students;

    public function mount($class, $id){
        $this->class = $class;
        $this->id = $id;
        $this->students = Student::where('kelas_id', $id)->where('status', 'Belum lulus')->get();
    }

    public function render()
    {
        $class = Classrooms::findOrFail($this->id);
        $title = "Detail Kelas {$class->tingkat} {$class->nama}";

        return view('livewire.staff.admin.class.detail-class', compact('title'))->title($title);
    }
}
