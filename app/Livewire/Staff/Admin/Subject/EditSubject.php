<?php

namespace App\Livewire\Staff\Admin\Subject;

use App\Models\Subject;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditSubject extends Component
{
    #[Title('Edit Mata Pelajaran')]
    #[Layout('components.layouts.staff')]

    public $id;

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
            'kode' => 'required|max:255|unique:subjects,kode,' . $this->id,
            'tingkatan' => 'required|in:VII,VIII,IX',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function mount($id)
    {
        $subject = Subject::findOrFail($id);

        $this->id = $subject->id;
        $this->nama = $subject->nama;
        $this->kode = $subject->kode;
        $this->tingkatan = $subject->tingkatan;
        $this->status = $subject->status;
    }

    public function submit()
    {
        $data = $this->validate();

        $subject = Subject::findOrFail($this->id);
        $subject->update($data);

        session()->flash('success', "Berhasil memperbarui mata pelajaran {$subject->nama}.");
        return redirect()->to(route('subject.edit', $subject->id));
    }

    public function render()
    {
        $title = 'Edit Mata Pelajaran';

        return view('livewire.staff.admin.subject.edit-subject', compact('title'));
    }
}
