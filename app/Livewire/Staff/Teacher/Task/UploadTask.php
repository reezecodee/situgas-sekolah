<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Models\Assignment;
use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UploadTask extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.staff')]

    public $id;
    public $teachingSchedule;

    #[Validate]
    public $judul_tugas;
    #[Validate]
    public $deskripsi;
    #[Validate]
    public $tgl_mulai;
    #[Validate]
    public $tgl_selesai;
    #[Validate]
    public $file_soal;

    public function mount($id)
    {
        $this->id = $id;
        $this->teachingSchedule = TeachingSchedule::with('classroom')->where('id', $id)->first();
    }

    public function rules()
    {
        return [
            'judul_tugas' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'tgl_mulai' => 'required|date|date_format:Y-m-d',
            'tgl_selesai' => 'required|date|date_format:Y-m-d|after_or_equal:tgl_mulai',
            'file_soal' => 'required|file|mimes:pdf|max:5120'
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        $data['tahun_ajaran_id'] = $this->teachingSchedule->tahun_ajaran_id;
        $data['guru_id'] = $this->teachingSchedule->guru_id;
        $data['jadwal_mengajar_id'] = $this->teachingSchedule->id;
        $data['kelas_id'] = $this->teachingSchedule->kelas_id;

        $originalExtension = $this->file_soal->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $originalExtension;
        $filePath = $this->file_soal->storeAs('soal_tugas', $uniqueFileName, 'public');

        Assignment::create([
            ...$data,
            'file_soal' => $filePath
        ]);

        session()->flash('success', 'Berhasil membuat tugas baru.');
        return redirect()->to(route('teacher.taskCreated', $this->id));
    }

    public function render()
    {
        $title = "Upload Tugas Untuk Kelas {$this->teachingSchedule->classroom->tingkat} {$this->teachingSchedule->classroom->nama}";

        return view('livewire.staff.teacher.task.upload-task', compact('title'))->title($title);
    }
}
