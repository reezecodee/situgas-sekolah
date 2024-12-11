<?php

namespace App\Livewire\Staff\Teacher\Task;

use App\Models\Student;
use App\Models\Submission;
use App\Models\TeachingSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EvaluationTask extends Component
{
    #[Layout('components.layouts.staff')]

    public $id1;
    public $id2;

    #[Validate]
    public $nilai = [];
    #[Validate]
    public $komentar_guru = [];

    public function mount($id1, $id2)
    {
        // ID dari jadwal mengajar
        $this->id1 = $id1;

        // ID dari tugas
        $this->id2 = $id2;
    }

    protected $rules = [
        'nilai.*' => 'nullable|integer|min:0|max:100',
        'komentar_guru.*' => 'nullable|string|max:255',
    ];

    public function updatedNilai($value, $key)
    {
        $this->validateOnly("nilai.$key");

        $submission = Submission::where('siswa_id', $key)
            ->where('penugasan_id', $this->id2)
            ->first();

        if ($submission) {
            $submission->update(['nilai' => $value]);
        }
    }

    public function updatedKomentarGuru($value, $key)
    {
        $this->validateOnly("komentar_guru.$key");

        $submission = Submission::where('siswa_id', $key)
            ->where('penugasan_id', $this->id2)
            ->first();

        if ($submission) {
            $submission->update(['komentar_guru' => $value]);
        }
    }

    public function render()
    {
        $title = 'Evaluasi Pengerjaan Tugas';

        $teachingSchedule = TeachingSchedule::findOrFail($this->id1);

        $students = Student::with(['submission' => function ($query) {
            $query->where('penugasan_id', $this->id2);
        }])
            ->where('kelas_id', $teachingSchedule->kelas_id)
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
