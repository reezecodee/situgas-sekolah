<?php

namespace App\Livewire\Student\Academics\Class;

use App\Models\Classrooms;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MyClass extends Component
{
    #[Title('Kelas Saya')]
    #[Layout('components.layouts.student')]

    public function render()
    {
        $title = 'Kelas Saya';
        $student = Student::where('user_id', Auth::user()->id)->first();
        $students = Student::where('kelas_id', $student->kelas_id)->where('status', 'Belum lulus')->orderBy('nama', 'asc')->get();
        $class = Classrooms::with('teacher.user')->find($student->kelas_id);

        return view('livewire.student.academics.class.my-class', compact('title', 'students', 'class'));
    }
}
