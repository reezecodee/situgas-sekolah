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
    public $nama;
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
