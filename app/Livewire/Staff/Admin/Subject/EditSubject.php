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
    public $nama, $kode, $tingkatan, $status;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'kode' => 'required||max:255|unique:subjects,kode,'.$this->id,
            'tingkatan' => 'required|in:VII,VIII,IX',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama mata pelajaran wajib diisi.',
            'nama.max' => 'Nama mata pelajaran tidak boleh lebih dari :max karakter.',
        
            'kode.required' => 'Kode mata pelajaran wajib diisi.',
            'kode.unique' => 'Kode mata pelajaran sudah terdaftar, gunakan kode lain.',
            'kode.max' => 'Kode mata pelajaran tidak boleh lebih dari :max karakter.',
        
            'tingkatan.required' => 'Tingkatan wajib dipilih.',
            'tingkatan.in' => 'Tingkatan harus berupa salah satu dari: VII, VIII, atau IX.',
        
            'status.required' => 'Status mata pelajaran wajib diisi.',
            'status.in' => 'Status harus berupa salah satu dari: Aktif atau Tidak aktif.',
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
