<?php

namespace App\Livewire\Staff\Admin\Teacher;

use App\Exports\TeacherScheduleExport;
use App\Models\SchoolYear;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ListTeacher extends Component
{
    #[Title('Daftar Guru')]
    #[Layout('components.layouts.staff')]

    public function downloadSchedule($id)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $periode = str_replace(['/', '\\'], '-', $schoolYear->periode);
        $fileName = "Jadwal Tahun Ajaran {$periode} Semester {$schoolYear->semester}";
        return Excel::download(new TeacherScheduleExport($schoolYear->id, $id), "$fileName.xlsx");
    }

    public function render()
    {
        $title = 'Daftar Guru';

        return view('livewire.staff.admin.teacher.list-teacher', compact('title'));
    }
}
