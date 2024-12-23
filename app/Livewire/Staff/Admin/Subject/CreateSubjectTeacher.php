<?php

namespace App\Livewire\Staff\Admin\Subject;

use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\Teacher;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateSubjectTeacher extends Component
{
    #[Title('Tambah Guru Pengampu')]
    #[Layout('components.layouts.staff')]

    public $mapel_id;
    public $guru_id;

    public function rules()
    {
        return [
            'mapel_id' => 'required|exists:subjects,id',
            'guru_id' => 'required|exists:teachers,id',
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

        $subjects = Subject::where('status', 'Aktif')->get();
        $teachers = Teacher::where('status', 'Aktif')->get();

        return view('livewire.staff.admin.subject.create-subject-teacher', compact('title', 'teachers', 'subjects'));
    }
}
