<?php

namespace App\Livewire\Staff\Homeroom;

use App\Models\Classrooms;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GuidanceStudent extends Component
{
    #[Title('Murid Bimbingan')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Murid Bimbingan';
        $user = User::with('teacher')->find(Auth::user()->id);

        $classrooms = Classrooms::with('students')
            ->where('wali_kelas_id', $user->teacher->id)
            ->get();

        $students = $classrooms->pluck('students')->flatten();

        return view('livewire.staff.homeroom.guidance-student', compact('title', 'students'));
    }
}
