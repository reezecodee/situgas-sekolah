<?php

namespace App\Livewire\Staff\Teacher\Class;

use App\Models\PresenceTeacher;
use App\Models\SchoolYear;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Presence extends Component
{
    #[Title('Presensi Mata Pelajaran Matematika Kelas VII C')]
    #[Layout('components.layouts.staff')]

    public $id;
    public $presence;
    public $today;
    public $hour;
    public $teacher;
    public $isPresence;

    public function mount($id)
    {
        $this->id = $id;
        $this->presence = TeachingSchedule::with(['subjectTeacher', 'classroom'])->findOrFail($id);
        $this->today = Carbon::now()->translatedFormat('l');
        $this->hour = Carbon::now()->format('H:i');
        $this->isPresence = PresenceTeacher::latest()->first();
        $this->teacher = Teacher::where('user_id', Auth::user()->id)->first();
    }

    public function submit(){
        dd('Form berhasil disubmit!');
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();

        PresenceTeacher::create([
            'tahun_ajaran_id' => $schoolYear->id,
            'jadwal_mengajar_id' => $this->id,
            'guru_id' => $this->teacher->id,
            'kelas_id' => $this->presence->kelas_id,
            'tanggal' => date('Y-m-d'),
            'status_kehadiran' => 'Hadir'
        ]);

        session()->flash('success', 'Berhasil melakukan absesnsi hari ini.');
    }

    public function render()
    {
        $title = 'Presensi Mata Pelajaran Matematika Kelas VII C';

        return view('livewire.staff.teacher.class.presence', compact('title'));
    }
}
