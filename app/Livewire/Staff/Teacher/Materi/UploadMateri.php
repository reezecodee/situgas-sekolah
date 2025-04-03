<?php

namespace App\Livewire\Staff\Teacher\Materi;

use App\Models\Materi;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UploadMateri extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.staff')]

    protected $listeners = ['deleteMateri'];

    public $subjectTeacherId, $schoolYear;

    #[Validate]
    public $judul, $keterangan, $file_materi;

    public function mount($subjectTeacherId)
    {
        $this->subjectTeacherId = $subjectTeacherId;
        $this->schoolYear = SchoolYear::where('status', 'Aktif')->first();
    }

    public function rules()
    {
        return [
            'judul' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'file_materi' => 'required|file|mimes:pdf|max:5120'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.',
            'file_materi.required' => 'File materi wajib diunggah.',
            'file_materi.file' => 'File materi harus berupa file yang valid.',
            'file_materi.mimes' => 'File materi harus berupa file dengan format PDF.',
            'file_materi.max' => 'Ukuran file materi tidak boleh lebih dari 5MB.',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        $data['tahun_ajaran_id'] = $this->schoolYear->id;
        $data['pengampu_id'] = $this->subjectTeacherId;

        $originalExtension = $this->file_materi->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $originalExtension;
        $filePath = $this->file_materi->storeAs('bahan_ajar', $uniqueFileName, 'public');


        Materi::create([
            ...$data,
            'file_materi' => $filePath
        ]);

        session()->flash('success', 'Berhasil menambahkan materi tambahan baru.');
        return redirect()->to(route('teacher.uploadModule', $this->subjectTeacherId));
    }

    public function render()
    {
        $title = 'Upload Materi Tambahan';
        $materis = Materi::where('tahun_ajaran_id', $this->schoolYear->id)->where('pengampu_id', $this->subjectTeacherId)->paginate(10);

        return view('livewire.staff.teacher.materi.upload-materi', compact('title', 'materis'))->title($title);
    }
}
