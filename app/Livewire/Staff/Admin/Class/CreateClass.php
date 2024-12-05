<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\Classrooms;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateClass extends Component
{
    #[Title('Buat Kelas Baru')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $nama;
    #[Validate]
    public $tingkat;
    #[Validate]
    public $status;

    public function rules()
    {
        return [
            'nama' => 'required',
            'tingkat' => 'required|in:VII,VIII,IX',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        Classrooms::create($data);

        session()->flash("success", "Berhasil menambahkan kelas baru {$this->tingkat} {$this->nama}");
        return redirect()->to(route('class.list'));
    }

    public function render()
    {
        $title = 'Buat Kelas Baru';

        return view('livewire.staff.admin.class.create-class', compact('title'));
    }
}
