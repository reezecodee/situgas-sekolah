<?php

namespace App\Livewire\Staff\Teacher\Materi;

use App\Models\SubjectTeacher;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListMateri extends Component
{
    #[Title('Daftar Materi')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Materi';
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $subjects = SubjectTeacher::with(['subject', 'teachingSchedule.classroom'])->where('guru_id', $teacher->id)->get();

        return view('livewire.staff.teacher.materi.list-materi', compact('title', 'subjects'));
    }
}
