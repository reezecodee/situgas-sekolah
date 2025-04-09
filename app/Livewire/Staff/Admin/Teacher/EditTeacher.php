<?php

namespace App\Livewire\Staff\Admin\Teacher;

use App\Models\Teacher;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditTeacher extends Component
{
    #[Layout('components.layouts.staff')]
    
    public $teacher;
    #[Validate]
    public $nama, $nuptk_nis, $email, $tgl_lahir, $status;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'nuptk_nis' => 'required|max:255|unique:users,nuptk_nis,'. $this->teacher->user_id,
            'email' => 'required|email|max:255|unique:users,email,'. $this->teacher->user_id,
            'tgl_lahir' => 'required|date|date_format:Y-m-d|before:today',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari :max karakter.',
            
            'nuptk_nis.required' => 'NUPTK wajib diisi.',
            'nuptk_nis.unique' => 'NUPTK ini sudah terdaftar, gunakan NUPTK lain.',
            'nuptk_nis.max' => 'NUPTK tidak boleh lebih dari :max karakter.',
        
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email ini sudah terdaftar, gunakan email lain.',
        
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tgl_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',
            'tgl_lahir.date_format' => 'Format tanggal lahir harus Y-m-d (contoh: 2025-01-17).',
            'tgl_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
        
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus berupa salah satu dari: Aktif atau Tidak aktif.',
        ];
    }

    public function mount($teacherId)
    {
        $this->teacher = Teacher::with('user')->findOrFail($teacherId);
        $this->nama = $this->teacher->nama;
        $this->nuptk_nis = $this->teacher->user->nuptk_nis;
        $this->email = $this->teacher->user->email;
        $this->tgl_lahir = $this->teacher->tgl_lahir;
        $this->status = $this->teacher->status;

    }

    public function submit()
    {
        $data = $this->validate();

        $user = User::findOrFail($this->teacher->user_id);
        $user->update([
            'nuptk_nis' => $data['nuptk_nis'],
            'email' => $data['email']
        ]);

        $this->teacher->update([
            'nama' => $data['nama'],
            'tgl_lahir' => $data['tgl_lahir'],
            'status' => $data['status'],
        ]);

        session()->flash('success', 'Berhasil memperbarui data guru.');
        return redirect()->to(route('teacher.edit', $this->teacher->id));
    }

    public function render()
    {
        $title = "Edit Data Guru {$this->teacher->nama}";

        return view('livewire.staff.admin.teacher.edit-teacher')->title($title);
    }
}
