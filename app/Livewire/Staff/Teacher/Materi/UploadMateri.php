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

    public $id;
    public $schoolYear;

    #[Validate]
    public $judul;
    #[Validate]
    public $keterangan;
    #[Validate]
    public $file_materi;

    public function mount($id)
    {
        $this->id = $id;
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

    public function submit()
    {
        $data = $this->validate();
        $data['tahun_ajaran_id'] = $this->schoolYear->id;
        $data['pengampu_id'] = $this->id;

        $originalExtension = $this->file_materi->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $originalExtension;
        $filePath = $this->file_materi->storeAs('bahan_ajar', $uniqueFileName, 'public');


        Materi::create([
            ...$data,
            'file_materi' => $filePath
        ]);

        session()->flash('success', 'Berhasil menambahkan materi tambahan baru.');
        return redirect()->to(route('teacher.uploadModule', $this->id));
    }

    public function deleteMateri($id)
    {
        try {
            $materi = Materi::findOrFail($id);

            if ($materi->file_materi && Storage::disk('public')->exists($materi->file_materi)) {
                Storage::disk('public')->delete($materi->file_materi);
            }

            $materi->delete();

            session()->flash('success', 'Berhasil menghapus materi');
        } catch (\Exception $e) {
            session()->flash('failed', 'Terjadi kesalahan saat menghapus materi');
        }

        return redirect()->route('teacher.uploadModule', $this->id);
    }


    public function render()
    {
        $title = 'Upload Materi Tambahan';
        $materis = Materi::where('tahun_ajaran_id', $this->schoolYear->id)->where('pengampu_id', $this->id)->get();

        return view('livewire.staff.teacher.materi.upload-materi', compact('title', 'materis'))->title($title);
    }
}
