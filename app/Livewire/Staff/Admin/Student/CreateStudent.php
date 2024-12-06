<?php

namespace App\Livewire\Staff\Admin\Student;

use App\Models\Classrooms;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateStudent extends Component
{
    #[Title('Tambah Siswa')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $kelas_id;
    #[Validate]
    public $nama;
    #[Validate]
    public $nis;
    #[Validate]
    public $nisn;
    #[Validate]
    public $email;
    #[Validate]
    public $jk;
    #[Validate]
    public $alamat;

    public $classes;

    public function mount()
    {
        $this->classes = Classrooms::select('id', 'nama', 'tingkat')
            ->orderByRaw("FIELD(tingkat, 'VI', 'VII', 'VIII', 'IX')") 
            ->orderBy('nama', 'ASC')
            ->get();
    }

    public function rules()
    {
        return [
            'kelas_id' => 'required|exists:classrooms,id',
            'nama' => 'required|max:255',
            'nis' => 'required|max:255|unique:students,nis',
            'nisn' => 'required|max:255|unique:students,nisn',
            'email' => 'required|max:255|unique:users,email',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required'
        ];
    }

    public function submit() {}

    public function render()
    {
        $title = 'Tambah Siswa';

        return view('livewire.staff.admin.student.create-student', compact('title'));
    }
}
