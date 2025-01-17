<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Models\Assignment;
use App\Models\SchoolYear;
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
    public $classId;

    #[Validate]
    public $judul_tugas, $deskripsi, $tgl_mulai, $tgl_selesai, $file_soal;

    public function mount($id, $classId)
    {
        $this->id = $id;
        $this->classId = $classId;
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();
        $this->teachingSchedule = TeachingSchedule::with('classroom')->where('pengampu_id', $id)->where('kelas_id', $classId)->where('tahun_ajaran_id', $schoolYear->id)->first();
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

    public function messages()
    {
        return [
            'judul_tugas.required' => 'Judul tugas wajib diisi.',
            'judul_tugas.max' => 'Judul tugas tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi tugas wajib diisi.',
            'deskripsi.max' => 'Deskripsi tugas tidak boleh lebih dari 255 karakter.',
            'tgl_mulai.required' => 'Tanggal mulai tugas wajib diisi.',
            'tgl_mulai.date' => 'Tanggal mulai tugas harus berupa tanggal yang valid.',
            'tgl_mulai.date_format' => 'Format tanggal mulai tugas harus YYYY-MM-DD.',
            'tgl_selesai.required' => 'Tanggal selesai tugas wajib diisi.',
            'tgl_selesai.date' => 'Tanggal selesai tugas harus berupa tanggal yang valid.',
            'tgl_selesai.date_format' => 'Format tanggal selesai tugas harus YYYY-MM-DD.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai tugas harus sama atau setelah tanggal mulai.',
            'file_soal.required' => 'File soal tugas wajib diunggah.',
            'file_soal.file' => 'File soal harus berupa file yang valid.',
            'file_soal.mimes' => 'File soal harus berformat PDF.',
            'file_soal.max' => 'Ukuran file soal tidak boleh lebih dari 5 MB.',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        $data['pengampu_id'] = $this->teachingSchedule->pengampu_id;
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
        return redirect()->to(route('teacher.taskCreated', ['id' => $this->id, 'classId' => $this->classId]));
    }

    public function render()
    {
        $title = "Upload Tugas Untuk Kelas {$this->teachingSchedule->classroom->tingkat} {$this->teachingSchedule->classroom->nama}";

        return view('livewire.staff.teacher.task.upload-task', compact('title'))->title($title);
    }
}
