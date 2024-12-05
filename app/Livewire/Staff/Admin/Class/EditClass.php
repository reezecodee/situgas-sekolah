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

    public $class;
    public $id;

    #[Validate]
    public $nama;
    #[Validate]
    public $tingkat;
    #[Validate]
    public $status;

    public function mount($class, $id){
        $this->class = $class;
        $this->id = $id;

        $class = Classrooms::findOrFail($id);
        $this->nama = $class->nama;
        $this->tingkat = $class->tingkat;
        $this->status = $class->status;
    }

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

        $classroom = Classrooms::findOrFail($this->id);
        $classroom->update($data);

        session()->flash("success", "Berhasil memperbarui kelas {$this->tingkat} {$this->nama}");
        return redirect()->to(route('class.subclass', $this->class));
    }

    public function render()
    {
        $title = "Edit Kelas {$this->class} {$this->nama}";

        return view('livewire.staff.admin.class.edit-class', compact('title'))->title($title);
    }
}
