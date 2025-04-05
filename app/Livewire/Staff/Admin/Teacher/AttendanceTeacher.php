<?php

namespace App\Livewire\Staff\Admin\Teacher;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AttendanceTeacher extends Component
{
    #[Title('Kehadiran Guru')]
    #[Layout('components.layouts.staff')]

    public $teacherId;

    public function mount($teacherId)
    {
        $this->teacherId = $teacherId;
    }

    public function render()
    {
        return view('livewire.staff.admin.teacher.attendance-teacher');
    }
}
