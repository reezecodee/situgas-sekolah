<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\Classrooms;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListClass extends Component
{
    #[Title('Daftar Kelas')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Kelas';
        $classes = Classrooms::select('tingkat', DB::raw('count(*) as total'))->groupBy('tingkat')->get();

        return view('livewire.staff.admin.class.list-class', compact('title', 'classes'));
    }
}
