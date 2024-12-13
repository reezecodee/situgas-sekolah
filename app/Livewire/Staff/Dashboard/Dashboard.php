<?php

namespace App\Livewire\Staff\Dashboard;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard Staff')]
    #[Layout('components.layouts.staff')]

    public $countOfAdmin;
    public $countOfTeacher;
    public $countOfStudent;

    public function mount()
    {
        $this->countOfAdmin = Admin::count();
        $this->countOfTeacher = Teacher::count();
        $this->countOfStudent = Student::count();
    }

    public function render()
    {
        $title = 'Dashboard Staff';

        return view('livewire.staff.dashboard.dashboard', compact('title'));
    }
}
