<?php

namespace App\Livewire\Staff\Admin\Student;

use App\Models\Classrooms;
use App\Models\Student;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditStudent extends Component
{
    #[Title('Edit Siswa')]
    #[Layout('components.layouts.staff')]

    public $user_id;
    public $student_id;

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
    #[Validate]
    public $status;
    #[Validate]
    public $tgl_lahir;

    public $classes;

    public function mount($id)
    {
        $this->classes = Classrooms::select('id', 'nama', 'tingkat')
            ->orderByRaw("FIELD(tingkat, 'VII', 'VIII', 'IX')")
            ->orderBy('nama', 'ASC')
            ->get();

        $student = Student::with('user')->findOrFail($id);

        $this->user_id = $student->user->id;
        $this->student_id = $student->id;
        $this->kelas_id = $student->kelas_id;
        $this->nama = $student->nama;
        $this->nis = $student->nis;
        $this->nisn = $student->nisn;
        $this->email = $student->user->email;
        $this->jk = $student->jk;
        $this->alamat = $student->alamat;
        $this->status = $student->status;
        $this->tgl_lahir = $student->tgl_lahir;
    }

    public function rules()
    {
        return [
            'kelas_id' => 'required|exists:classrooms,id',
            'nama' => 'required|max:255',
            'nis' => 'required|max:255|unique:students,nis,' . $this->student_id,
            'nisn' => 'required|max:255|unique:students,nisn,' . $this->student_id,
            'email' => 'required|max:255|unique:users,email,' . $this->user_id,
            'jk' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date|date_format:Y-m-d|before:today',
            'status' => 'required|in:Belum lulus,Lulus,Nonaktif'
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        $user = User::findOrFail($this->user_id);
        $user->update([
            'email' => $data['email'],
        ]);

        if ($this->tgl_lahir !== $data['tgl_lahir']) {
            $user->update([
                'password' => bcrypt($data['tgl_lahir']),
            ]);
        }

        $student = Student::findOrFail($this->student_id);
        $student->update([
            'kelas_id' => $data['kelas_id'],
            'nama' => $data['nama'],
            'nis' => $data['nis'],
            'nisn' => $data['nisn'],
            'jk' => $data['jk'],
            'tgl_lahir' => $data['tgl_lahir'],
            'alamat' => $data['alamat'],
            'status' => $data['status']
        ]);

        session()->flash("success", "Berhasil memperbarui data siswa {$student->nama}");
        return redirect()->to(route('student.edit', $student->id));
    }

    public function render()
    {
        $title = 'Edit Siswa';

        return view('livewire.staff.admin.student.edit-student', compact('title'));
    }
}
