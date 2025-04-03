<?php

namespace App\Livewire\Staff\Admin\Class;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Subclass extends Component
{
    #[Layout('components.layouts.staff')]

    public $classLevel;

    public function mount($classLevel)
    {
        $this->classLevel = $classLevel;
    }

    public function render()
    {
        $title = "Daftar Subkelas {$this->classLevel}";

        return view('livewire.staff.admin.class.subclass', compact('title'))->title($title);
    }
}
