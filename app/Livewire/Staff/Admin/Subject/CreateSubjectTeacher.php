<?php

namespace App\Livewire\Staff\Admin\Subject;

use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\Teacher;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateSubjectTeacher extends Component
{
    #[Title('Tambah Guru Pengampu')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $mapel_id, $guru_id;

    public function rules()
    {
        return [
            'mapel_id' => 'required|exists:subjects,id',
            'guru_id' => [
                'required',
                'exists:teachers,id',
                Rule::unique('subject_teachers', 'guru_id')->where(function ($query) {
                    return $query->where('mapel_id', $this->mapel_id); 
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'mapel_id.required' => 'Mata pelajaran wajib dipilih.',
            'mapel_id.exists' => 'Mata pelajaran yang dipilih tidak valid.',
        
            'guru_id.required' => 'Guru wajib dipilih.',
            'guru_id.exists' => 'Guru yang dipilih tidak valid.',
            'guru_id.unique' => 'Kombinasi mata pelajaran dan guru sudah terdaftar.',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        SubjectTeacher::create($data);

        session()->flash('success', 'Berhasil menambahkan guru pengampu');
        return redirect()->to(route('subject.teacher'));
    }

    public function render()
    {
        $title = 'Tambah Guru Pengampu';

        $subjects = Subject::where('status', 'Aktif')->orderByRaw("FIELD(tingkatan, 'VII', 'VIII', 'IX')")->get();
        $teachers = Teacher::where('status', 'Aktif')->get();

        return view('livewire.staff.admin.subject.create-subject-teacher', compact('title', 'teachers', 'subjects'));
    }
}
