<?php

namespace App\Livewire\Staff\Admin\Admin;

use App\Models\Admin;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateAdmin extends Component
{
    #[Title('Tambah Admin')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $nama, $email, $nuptk_nis, $tgl_lahir, $status;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'nuptk_nis' => 'required|max:255|unique:users,nuptk_nis',
            'email' => 'required|email|max:255|unique:users,email',
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
            'nuptk_nis.max' => 'NUPTK tidak boleh lebih dari :max karakter.',
            'nuptk_nis.unique' => 'NUPTK ini sudah terdaftar, gunakan NUPTK lain.',

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

    public function submit()
    {
        $data = $this->validate();

        $user = User::create([
            'nuptk_nis' => $data['nuptk_nis'],
            'email' => $data['email'],
            'password' => bcrypt($data['tgl_lahir'])
        ]);
        $user->assignRole('Admin');

        Admin::create([
            'user_id' => $user->id,
            'nama' => $data['nama'],
            'tgl_lahir' => $data['tgl_lahir'],
            'status' => $data['status']
        ]);

        session()->flash("success", "Berhasil menambahkan admin baru.");
        return redirect()->to(route('admin.list'));
    }

    public function render()
    {
        $title = 'Tambah Admin';

        return view('livewire.staff.admin.admin.create-admin', compact('title'));
    }
}
