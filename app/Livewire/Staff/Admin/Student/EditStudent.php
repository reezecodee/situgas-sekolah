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

    public $userId;
    public $studentId;

    #[Validate]
    public $kelas_id, $nama, $nis, $nisn, $email, $jk, $alamat, $status, $tgl_lahir;

    public $classes;

    public function mount($studentId)
    {
        $this->classes = Classrooms::select('id', 'nama', 'tingkat')->where('status', 'Aktif')
            ->orderByRaw("FIELD(tingkat, 'VII', 'VIII', 'IX')")
            ->orderBy('nama', 'ASC')
            ->get();

        $student = Student::with('user')->findOrFail($studentId);

        $this->userId = $student->user->id;
        $this->studentId = $student->id;
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
            'nis' => 'required|max:255|unique:students,nis,' . $this->studentId,
            'nisn' => 'required|max:255|unique:students,nisn,' . $this->studentId,
            'email' => 'required|max:255|unique:users,email,' . $this->userId,
            'jk' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date|date_format:Y-m-d|before:today',
            'status' => 'required|in:Belum lulus,Lulus,Nonaktif'
        ];
    }

    public function messages()
    {
        return [
            'kelas_id.required' => 'Kelas wajib dipilih.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
        
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari :max karakter.',
        
            'nis.required' => 'NIS wajib diisi.',
            'nis.max' => 'NIS tidak boleh lebih dari :max karakter.',
            'nis.unique' => 'NIS ini sudah terdaftar, gunakan NIS lain.',
        
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.max' => 'NISN tidak boleh lebih dari :max karakter.',
            'nisn.unique' => 'NISN ini sudah terdaftar, gunakan NISN lain.',
        
            'email.required' => 'Alamat email wajib diisi.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email ini sudah terdaftar, gunakan email lain.',
        
            'jk.required' => 'Jenis kelamin wajib diisi.',
            'jk.in' => 'Jenis kelamin harus berupa Laki-laki atau Perempuan.',
        
            'alamat.required' => 'Alamat wajib diisi.',
        
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tgl_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',
            'tgl_lahir.date_format' => 'Format tanggal lahir harus Y-m-d (contoh: 2025-01-17).',
            'tgl_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
        
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus berupa salah satu dari: Belum lulus, Lulus, atau Nonaktif.',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        $user = User::findOrFail($this->userId);
        $user->update([
            'email' => $data['email'],
        ]);

        if ($this->tgl_lahir !== $data['tgl_lahir']) {
            $user->update([
                'password' => bcrypt($data['tgl_lahir']),
            ]);
        }

        $student = Student::findOrFail($this->studentId);
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
