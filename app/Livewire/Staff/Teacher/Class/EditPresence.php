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
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditPresence extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.staff')]

    public $id;
    public $date;
    public $presence;
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
            'bukti' => $this->bukti instanceof \Illuminate\Http\UploadedFile
            ? 'nullable|file|mimes:pdf|max:5120'
            : 'nullable'
        ];
    }

    public function mount($id, $date)
    {
        $this->id = $id;
        $this->date = $date;
        $this->presence = TeachingSchedule::with(['subjectTeacher', 'classroom'])->findOrFail($id);
        $this->teacher = Teacher::where('user_id', Auth::user()->id)->first();

        $presence = PresenceTeacher::where('jadwal_mengajar_id', $id)->where('tanggal', $date)->first();
        $this->presenceTeacher = $presence;

        if ($presence) {
            $this->isPresence = true;
        } else {
            $this->isPresence = false;
        }

        $this->pembelajaran_materi = $presence->pembelajaran_materi ?? '';
        $this->deskripsi = $presence->deskripsi ?? '';
        $this->bukti = $presence->bukti ? $presence->bukti : null;
    }

    public function teachingTestimony()
    {
        $existingPresence = PresenceTeacher::where('jadwal_mengajar_id', $this->id)
            ->whereDate('tanggal', $this->date)
            ->first();

        if (!$existingPresence) {
            session()->flash('failed', 'Harap lakukan presensi terlebih dahulu.');
            return redirect()->to(route('teacher.presence', $this->id));
        }

        $data = $this->validate();

        $filePath = $existingPresence->bukti;

        if ($this->bukti instanceof \Illuminate\Http\UploadedFile) {
            $originalExtension = $this->bukti->getClientOriginalExtension();
            $uniqueFileName = uniqid() . '.' . $originalExtension;
            $filePath = $this->bukti->storeAs('bukti_ajar', $uniqueFileName, 'public');

            if ($existingPresence->bukti && Storage::disk('public')->exists($existingPresence->bukti)) {
                Storage::disk('public')->delete($existingPresence->bukti);
            }
        }

        $existingPresence->update([
            ...$data,
            'bukti' => $filePath,
        ]);

        session()->flash('success', 'Berhasil menyimpan bukti kehadiran');
        return redirect()->to(route('teacher.editPresence', ['id' => $this->id, 'date' => $this->date]));
    }


    public function presenceStudent($id, $status)
    {
        $existingPresence = PresenceTeacher::where('jadwal_mengajar_id', $this->id)
            ->whereDate('tanggal', $this->date)
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
        return view('livewire.staff.teacher.class.edit-presence', compact('title', 'attend', 'sick', 'permit', 'alpha', 'countStudent', 'students'))->title($title);
    }
}
