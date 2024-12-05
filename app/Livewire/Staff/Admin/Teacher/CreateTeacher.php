<?php

namespace App\Livewire\Staff\Admin\Teacher;

use App\Models\Teacher;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTeacher extends Component
{
    #[Title('Tambah Guru')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $nama;
    #[Validate]
    public $nuptk;
    #[Validate]
    public $email;
    #[Validate]
    public $tgl_lahir;
    #[Validate]
    public $status;

    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'nuptk' => 'nullable|unique:teachers,nuptk|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'tgl_lahir' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['tgl_lahir'])
        ]);

        Teacher::create([
            'user_id' => $user->id,
            'nama' => $data['nama'],
            'nuptk' => $data['nuptk'],
            'tgl_lahir' => $data['tgl_lahir'],
            'status' => $data['status']
        ]);

        session()->flash("success", "Berhasil menambahkan guru baru.");
        return redirect()->to(route('teacher.list'));
    }

    public function render()
    {
        $title = 'Tambah Guru';

        return view('livewire.staff.admin.teacher.create-teacher', compact('title'));
    }
}
