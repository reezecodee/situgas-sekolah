<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\Classrooms;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Subclass extends Component
{
    #[Layout('components.layouts.staff')]

    public $class;

    public function mount($class)
    {
        $this->class = $class;
    }

    public function render()
    {
        $title = "Daftar Subkelas {$this->class}";

        return view('livewire.staff.admin.class.subclass', compact('title'))->title($title);
    }
}
