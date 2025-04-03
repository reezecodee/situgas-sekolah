<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Models\Assignment;
use App\Models\Student;
use App\Models\Submission;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EvaluationTask extends Component
{
    #[Layout('components.layouts.staff')]

    public $assignmentId, $classId, $subjectTeacherId;

    #[Validate]
    public $nilai = [], $komentar_guru = [];

    public function mount($assignmentId, $classId)
    {
        $this->assignmentId = $assignmentId;
        $this->classId = $classId;
        $assignment = Assignment::findOrFail($assignmentId);
        $this->subjectTeacherId = $assignment->pengampu_id;
    }

    protected $rules = [
        'nilai.*' => 'nullable|integer|min:0|max:100',
        'komentar_guru.*' => 'nullable|string|max:255',
    ];

    protected $messages = [
        'nilai.*.integer' => 'Nilai harus berupa angka.',
        'nilai.*.min' => 'Nilai tidak boleh kurang dari 0.',
        'nilai.*.max' => 'Nilai tidak boleh lebih dari 100.',
        'komentar_guru.*.string' => 'Komentar guru harus berupa teks.',
        'komentar_guru.*.max' => 'Komentar guru tidak boleh lebih dari 255 karakter.',
    ];

    public function updatedNilai($value, $key)
    {
        $this->validateOnly("nilai.$key");

        $submission = Submission::where('siswa_id', $key)
            ->where('penugasan_id', $this->assignmentId)
            ->first();

        if ($submission) {
            $submission->update(['nilai' => $value]);
        }
    }

    public function updatedKomentarGuru($value, $key)
    {
        $this->validateOnly("komentar_guru.$key");

        $submission = Submission::where('siswa_id', $key)
            ->where('penugasan_id', $this->assignmentId)
            ->first();

        if ($submission) {
            $submission->update(['komentar_guru' => $value]);
        }
    }

    public function render()
    {
        $title = 'Evaluasi Pengerjaan Tugas';

        $students = Student::with(['submission' => function ($query) {
            $query->where('penugasan_id', $this->assignmentId);
        }])
            ->where('kelas_id', $this->classId)
            ->orderBy('nama', 'asc')
            ->get();

        foreach ($students as $student) {
            $submission = $student->submission->first();
            if ($submission) {
                $this->nilai[$student->id] = $submission->nilai;
                $this->komentar_guru[$student->id] = $submission->komentar_guru;
            }
        }

        return view('livewire.staff.teacher.task.evaluation-task', compact('title', 'students'))
            ->title($title);
    }
}
