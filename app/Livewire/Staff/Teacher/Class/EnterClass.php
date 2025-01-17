<?php

namespace App\Livewire\Staff\Teacher\Class;

use App\Exports\TeacherScheduleExport;
use App\Models\SchoolYear;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class EnterClass extends Component
{
    #[Title('Masuk Kelas')]
    #[Layout('components.layouts.staff')]

    public function downloadSchedule()
    {
        $userId = Auth::user()->id;
        $teacherId = Teacher::where('user_id', $userId)->first();
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $periode = str_replace(['/', '\\'], '-', $schoolYear->periode);
        $fileName = "Jadwal Tahun Ajaran {$periode} Semester {$schoolYear->semester}";
        return Excel::download(new TeacherScheduleExport($schoolYear->id, $teacherId->id), "$fileName.xlsx");
    }

    public function render()
    {
        $title = 'Masuk Kelas';
        $teacher = Teacher::with('user')->where('user_id', Auth::user()->id)->first();

        $schoolYear = SchoolYear::where('status', 'Aktif')->first();

        $teachingSchedules = TeachingSchedule::with(['schoolYear', 'teacher', 'classroom', 'subjectTeacher'])
            ->where('tahun_ajaran_id', $schoolYear->id)
            ->where('guru_id', $teacher->id)
            ->get()
            ->groupBy(function ($schedule) {
                return $schedule->kelas_id . '-' . $schedule->subjectTeacher->mapel_id; 
            })
            ->map(function ($group) {
                return $group->first();
            });

        return view('livewire.staff.teacher.class.enter-class', compact('title', 'teachingSchedules'));
    }
}
