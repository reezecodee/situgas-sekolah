<?php

namespace App\Livewire\Staff\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditTeacher extends Component
{
    #[Layout('components.layouts.staff')]
    
    public $teacher;

    public function mount($id)
    {
        $this->teacher = Teacher::with('user')->findOrFail($id);
    }

    public function render()
    {
        $title = "Edit Data Guru {$this->nama}";

        return view('livewire.staff.admin.teacher.edit-teacher')->title($title);
    }
}
