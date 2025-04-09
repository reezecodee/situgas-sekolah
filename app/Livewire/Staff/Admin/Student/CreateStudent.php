<?php

namespace App\Livewire\Staff\Admin\Student;

use App\Models\Classrooms;
use App\Models\Student;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateStudent extends Component
{
    #[Title('Tambah Siswa')]
    #[Layout('components.layouts.staff')]

    public $classes;

    #[Validate]
    public $kelas_id, $nama, $nuptk_nis, $nisn, $email, $jk, $alamat, $status, $tgl_lahir;

    public function mount()
    {
        $this->classes = Classrooms::select('id', 'nama', 'tingkat')->where('status', 'Aktif')
            ->orderByRaw("FIELD(tingkat, 'VII', 'VIII', 'IX')")
            ->orderBy('nama', 'ASC')
            ->get();
    }

    public function rules()
    {
        return [
            'kelas_id' => 'required|exists:classrooms,id',
            'nama' => 'required|max:255',
            'nuptk_nis' => 'required|max:255|unique:users,nuptk_nis',
            'nisn' => 'required|max:255|unique:students,nisn',
            'email' => 'required|max:255|unique:users,email',
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

            'nuptk_nis.required' => 'NIS wajib diisi.',
            'nuptk_nis.max' => 'NIS tidak boleh lebih dari :max karakter.',
            'nuptk_nis.unique' => 'NIS ini sudah terdaftar, gunakan NIS lain.',

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

        $user = User::create([
            'nuptk_nis' => $data['nuptk_nis'],
            'email' => $data['email'],
            'password' => bcrypt($data['tgl_lahir'])
        ]);
        $user->assignRole('Siswa');

        $student = Student::create([
            'user_id' => $user->id,
            'kelas_id' => $data['kelas_id'],
            'nama' => $data['nama'],
            'nisn' => $data['nisn'],
            'jk' => $data['jk'],
            'tgl_lahir' => $data['tgl_lahir'],
            'alamat' => $data['alamat'],
            'status' => $data['status']
        ]);

        session()->flash("success", "Berhasil menambahkan data siswa {$student->nama}");
        return redirect()->to(route('student.list'));
    }

    public function render()
    {
        $title = 'Tambah Siswa';

        return view('livewire.staff.admin.student.create-student', compact('title'));
    }
}
