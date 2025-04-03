<?php

namespace App\Livewire\Staff\Admin\Class;

use App\Models\Classrooms;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditClass extends Component
{
    #[Title('Edit Kelas VI')]
    #[Layout('components.layouts.staff')]

    public $classId, $classLevel;

    #[Validate]
    public $nama, $tingkat, $status;

    public function mount($classLevel, $classId)
    {
        $this->classLevel = $classLevel;
        $this->classId = $classId;

        $class = Classrooms::findOrFail($classId);
        $this->nama = $class->nama;
        $this->tingkat = $class->tingkat;
        $this->status = $class->status;
    }

    public function rules()
    {
        return [
            'nama' => [
                'required',
                function ($attribute, $value, $fail) {
                    $exists = Classrooms::where('nama', $value)
                        ->where('tingkat', $this->tingkat)->where('id', $this->id)
                        ->exists();

                    if (!$exists) {
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

        $classroom = Classrooms::findOrFail($this->classId);
        $classroom->update($data);

        session()->flash("success", "Berhasil memperbarui kelas {$this->tingkat} {$this->nama}");
        return redirect()->to(route('class.subclass', $this->classLevel));
    }

    public function render()
    {
        $title = "Edit Kelas {$this->classLevel} {$this->nama}";

        return view('livewire.staff.admin.class.edit-class', compact('title'))->title($title);
    }
}
