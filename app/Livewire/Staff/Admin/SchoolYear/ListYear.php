<?php

namespace App\Livewire\Staff\Admin\SchoolYear;

use App\Models\SchoolYear;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListYear extends Component
{
    use WithPagination;

    #[Title('Daftar Tahun Ajaran')]
    #[Layout('components.layouts.staff')]

    public function render()
    {
        $title = 'Daftar Tahun Ajaran';
        $schoolYears = SchoolYear::paginate(10);

        return view('livewire.staff.admin.school-year.list-year', compact('title', 'schoolYears'));
    }
}
