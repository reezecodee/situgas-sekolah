<?php

namespace App\Livewire\Student\Activities\Assignment;

use App\Models\Assignment;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UploadAssignment extends Component
{
    use WithFileUploads;

    #[Title('Upload Tugas')]
    #[Layout('components.layouts.student')]

    public $idTeaching;
    public $pengampuId;
    #[Validate]
    public $file_pengerjaan;
    public $fileUploaded;
    public $id;

    public function rules()
    {
        return [
            'file_pengerjaan' => 'required|file|mimes:pdf|max:5120'
        ];
    }

    public function mount($id)
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $assignment = Assignment::findOrFail($id);
        $submission = Submission::where('siswa_id', $student->id)->where('penugasan_id', $assignment->id)->first();

        if ($submission) {
            $this->fileUploaded = basename($submission->file_pengerjaan);
        } else {
            $this->fileUploaded = null;
        }

        $this->idTeaching = $assignment->jadwal_mengajar_id;
        $this->file_pengerjaan = $submission->file_pengerjaan ?? '';
        $this->pengampuId = $assignment->pengampu_id;
    }

    public function submit()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();

        $assignment = Assignment::findOrFail($this->id);

        $submission = Submission::where('siswa_id', $student->id)
            ->where('penugasan_id', $assignment->id)
            ->first();

        $originalExtension = $this->file_pengerjaan->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $originalExtension;

        $filePath = $this->file_pengerjaan->storeAs('jawaban_tugas', $uniqueFileName, 'public');

        if ($submission) {
            $submission->file_pengerjaan = $filePath;
            $submission->save();

            session()->flash('success', 'Tugas berhasil diperbarui.');
        } else {
            Submission::create([
                'siswa_id' => $student->id,
                'penugasan_id' => $assignment->id,
                'file_pengerjaan' => $filePath,
                'status' => 'Dikerjakan',
                'tanggal' => now()->toDateString(),
            ]);

            session()->flash('success', 'Tugas berhasil dikumpulkan.');
        }

        return redirect()->to(route('student.uploadAssignment', $assignment->id));
    }


    public function render()
    {
        $title = 'Upload Tugas';

        return view('livewire.student.activities.assignment.upload-assignment', compact('title'));
    }
}
