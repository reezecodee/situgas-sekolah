<?php

namespace App\Livewire\Staff\Teacher\Class;

use App\Models\PresenceStudent;
use App\Models\PresenceTeacher;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\SubjectTeacher;
use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Presence extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.staff')]

    public $id;
    public $teachingScheduleId;
    public $classId;
    public $presence;
    public $today;
    public $hour;
    public $teacher;
    public $presenceTeacher;
    public $isPresence = false;

    #[Validate]
    public $pembelajaran_materi;
    #[Validate]
    public $deskripsi;
    #[Validate]
    public $bukti;
    public $presenceStatus;

    public function rules()
    {
        return [
            'pembelajaran_materi' => 'required|max:255',
            'deskripsi' => 'required',
            'bukti' => 'required|file|mimes:pdf|max:5120'
        ];
    }

    public function mount($id, $classId)
    {
        $this->id = $id;
        $this->classId = $classId;
        
        $this->today = Carbon::now()->translatedFormat('l');
        $this->presence = TeachingSchedule::with(['subjectTeacher', 'classroom'])->where('pengampu_id', $id)->where('kelas_id', $classId)->where('hari', $this->today)->first() ?? TeachingSchedule::with(['subjectTeacher', 'classroom'])->where('pengampu_id', $id)->where('kelas_id', $classId)->first();

        $this->hour = Carbon::now()->format('H:i');
        $this->teacher = Teacher::where('user_id', Auth::user()->id)->first();

        $presence = PresenceTeacher::where('jadwal_mengajar_id', $this->presence->id ?? 0)->latest()->first();
        $this->presenceTeacher = $presence;

        if ($presence) {
            $presenceHour = Carbon::parse($presence->created_at);
            $jamMasuk = Carbon::parse($this->presence->jam_masuk ?? 0);
            $jamKeluar = Carbon::parse($this->presence->jam_keluar ?? 0);

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

        $this->pembelajaran_materi = $presence->pembelajaran_materi ?? '';
        $this->deskripsi = $presence->deskripsi ?? '';
        $this->bukti = $presence->bukti ?? '';
    }

    public function submit($classId, $today)
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $existingPresence = PresenceTeacher::where('pengampu_id', $this->id)
            ->where('tahun_ajaran_id', $schoolYear->id)
            ->where('kelas_id', $classId)
            ->whereDate('tanggal', Carbon::today())
            ->first();
        $teachingSchedule = TeachingSchedule::where('tahun_ajaran_id', $schoolYear->id)->where('pengampu_id', $this->id)->where('kelas_id', $classId)->where('hari', $today)->first();

        if ($existingPresence) {
            session()->flash('failed', 'Presensi hari ini sudah dilakukan.');
            return redirect()->to(route('teacher.presence', $this->id));
        }

        PresenceTeacher::create([
            'tahun_ajaran_id' => $schoolYear->id,
            'pengampu_id' => $teachingSchedule->id,
            'jadwal_mengajar_id' => $this->id,
            'guru_id' => $this->teacher->id,
            'kelas_id' => $classId,
            'tanggal' => Carbon::today()->toDateString(),
            'status_kehadiran' => 'Hadir'
        ]);

        session()->flash('success', 'Berhasil melakukan absensi hari ini.');
        return redirect()->to(route('teacher.presence', $this->id));
    }

    public function teachingTestimony()
    {
        $existingPresence = PresenceTeacher::where('jadwal_mengajar_id', $this->id)
            ->where('kelas_id', $this->classId)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if (!$existingPresence) {
            session()->flash('failed', 'Harap lakukan presensi terlebih dahulu.');
            return redirect()->to(route('teacher.presence', $this->id));
        }

        $data = $this->validate();

        $originalExtension = $this->bukti->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $originalExtension;
        $filePath = $this->bukti->storeAs('bukti_ajar', $uniqueFileName, 'public');

        $testimony = PresenceTeacher::findOrFail($existingPresence->id);
        $testimony->update([
            ...$data,
            'bukti' => $filePath,
        ]);

        session()->flash('success', 'Berhasil menyimpan bukti kehadiran');
        return redirect()->to(route('teacher.presence', $this->id));
    }

    public function presenceStudent($id, $status)
    {
        $existingPresence = PresenceTeacher::where('jadwal_mengajar_id', $this->presence->id)
            ->whereDate('tanggal', Carbon::today())
            ->first();
        $student = PresenceStudent::where('siswa_id', $id)->where('absen_guru_id', $existingPresence->id)->first();

        if (!$student) {
            PresenceStudent::create([
                'siswa_id' => $id,
                'absen_guru_id' => $existingPresence->id,
                'mapel_id' => $this->presence->subjectTeacher->subject->id,
                'status_kehadiran' => $status,
                'tanggal' => date('Y-m-d')
            ]);
        } else {
            $student->update([
                'status_kehadiran' => $status,
            ]);
        }
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

        $students = Student::with('presenceStudent')->where('kelas_id', $this->presence->kelas_id)->get();

        return view('livewire.staff.teacher.class.presence', compact('title', 'attend', 'sick', 'permit', 'alpha', 'countStudent', 'students'))->title($title);
    }
}
