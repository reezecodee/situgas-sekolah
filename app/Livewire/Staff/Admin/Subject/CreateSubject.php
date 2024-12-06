<?php

namespace App\Livewire\Staff\Admin\Subject;

use App\Models\Subject;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateSubject extends Component
{
    #[Title('Tambah Mata Pelajaran')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $nama;
    #[Validate]
    public $kode;
    #[Validate]
    public $tingkatan;
    #[Validate]
    public $status;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'kode' => 'required|unique:subjects,kode|max:255',
            'tingkatan' => 'required|in:VII,VIII,IX',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        $subject = Subject::create($data);

        session()->flash('success', "Berhasil menambahkan mata pelajaran {$subject->nama} untuk tingkat kelas {$subject->tingkatan}");
        return redirect()->to(route('subject.list'));
    }


    public function render()
    {
        $title = 'Tambah Mata Pelajaran';

        return view('livewire.staff.admin.subject.create-subject', compact('title'));
    }
}
