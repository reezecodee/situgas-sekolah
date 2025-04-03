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
    public $nama, $tingkat, $status;
    
    public function rules()
    {
        return [
            'nama' => [
                'required',
                function ($attribute, $value, $fail) {
                    $exists = Classrooms::where('nama', $value)
                        ->where('tingkat', $this->tingkat)
                        ->exists();

                    if ($exists) {
                        $fail('Kombinasi nama kelas dan tingkat sudah ada.');
                    }
                },
            ],
            'tingkat' => 'required|in:VII,VIII,IX',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama kelas wajib di isi',
            'tingkat.required' => 'Harap pilih tingkat kelas',
            'tingkat.in' => 'Harap pilih tingkat VII, VIII, atau IX',
            'status.required' => 'Harap pilih status kelas',
            'status.in' => 'Tidak dapat memilih status kelas selain Aktif dan Tidak aktif',
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
