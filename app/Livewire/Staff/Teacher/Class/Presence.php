<?php

namespace App\Livewire\Staff\Teacher\Class;

use App\Models\PresenceStudent;
use App\Models\PresenceTeacher;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Presence extends Component
{
    #[Layout('components.layouts.staff')]

    public $id;
    public $presence;
    public $today;
    public $hour;
    public $teacher;
    public $presenceTeacher;
    public $isPresence = false;

    public function mount($id)
    {
        $this->id = $id;
        $this->presence = TeachingSchedule::with(['subjectTeacher', 'classroom'])->findOrFail($id);
        $this->today = Carbon::now()->translatedFormat('l');
        $this->hour = Carbon::now()->format('H:i');
        $this->teacher = Teacher::where('user_id', Auth::user()->id)->first();

        $presence = PresenceTeacher::where('jadwal_mengajar_id', $id)->latest()->first();
        $this->presenceTeacher = $presence;

        if ($presence) {
            $presenceHour = Carbon::parse($presence->created_at);
            $jamMasuk = Carbon::parse($this->presence->jam_masuk);
            $jamKeluar = Carbon::parse($this->presence->jam_keluar);

            if ($presenceHour->greaterThanOrEqualTo($jamMasuk) && $presenceHour->lessThanOrEqualTo($jamKeluar) && $this->today == $this->presence->hari) {
                $this->isPresence = true;
            } else {
                if ($presence) {
                    $this->isPresence = true;
                } else {
                    $this->isPresence = false;
                }
            }
        } else {
            $this->isPresence = false;
        }
    }

    public function submit()
    {
        $existingPresence = PresenceTeacher::where('jadwal_mengajar_id', $this->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if ($existingPresence) {
            session()->flash('error', 'Presensi hari ini sudah dilakukan.');
            return redirect()->to(route('teacher.presence', $this->id));
        }

        $schoolYear = SchoolYear::where('status', 'Aktif')->first();

        PresenceTeacher::create([
            'tahun_ajaran_id' => $schoolYear->id,
            'jadwal_mengajar_id' => $this->id,
            'guru_id' => $this->teacher->id,
            'kelas_id' => $this->presence->kelas_id,
            'tanggal' => Carbon::today()->toDateString(),
            'status_kehadiran' => 'Hadir'
        ]);

        session()->flash('success', 'Berhasil melakukan absensi hari ini.');
        return redirect()->to(route('teacher.presence', $this->id));
    }

    public function render()
    {
        $subject = $this->presence->subjectTeacher->subject->nama;
        $className = $this->presence->classroom->nama;
        $classLevel = $this->presence->classroom->tingkat;
        $title = "Presensi Mata Pelajaran {$subject} Kelas {$classLevel} {$className}";

        $countStudent = Student::where('kelas_id', $this->presence->kelas_id)->count();

        if (!$this->presenceTeacher) {
            $attend = $sick = $permit = $alpha = 0;
        } else {
            $attend = PresenceStudent::where('absen_guru_id', $this->presenceTeacher->id)
                ->where('status_kehadiran', 'Hadir')
                ->count();

            $sick = PresenceStudent::where('absen_guru_id', $this->presenceTeacher->id)
                ->where('status_kehadiran', 'Sakit')
                ->count();

            $permit = PresenceStudent::where('absen_guru_id', $this->presenceTeacher->id)
                ->where('status_kehadiran', 'Izin')
                ->count();

            $alpha = PresenceStudent::where('absen_guru_id', $this->presenceTeacher->id)
                ->where('status_kehadiran', 'Alpha')
                ->count();
        }

        $students = Student::where('kelas_id', $this->presence->kelas_id)->get();

        return view('livewire.staff.teacher.class.presence', compact('title', 'attend', 'sick', 'permit', 'alpha', 'countStudent', 'students'))->title($title);
    }
}
