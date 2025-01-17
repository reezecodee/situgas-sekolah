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
    public $nama, $kode, $tingkatan, $status;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'kode' => 'required|unique:subjects,kode|max:255',
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
