<?php

namespace App\Livewire\Staff\Admin\SchoolYear;

use App\Models\SchoolYear;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditYear extends Component
{
    #[Title('Edit Tahun Ajaran')]
    #[Layout('components.layouts.staff')]

    public $id;
    #[Validate]
    public $periode;
    #[Validate]
    public $semester;
    #[Validate]
    public $tgl_mulai;
    #[Validate]
    public $tgl_selesai;
    #[Validate]
    public $status;

    public function rules(){
        return [
            'periode' => 'required|string|min:3',
            'semester' => 'required|string|in:Ganjil,Genap',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'status' => 'required|in:Aktif,Tidak aktif'
        ];
    }

    public function mount($id){
        $this->id = $id;
        $schoolYear = SchoolYear::findOrFail($this->id);

        $this->periode = $schoolYear->periode;
        $this->semester = $schoolYear->semester;
        $this->tgl_mulai = $schoolYear->tgl_mulai;
        $this->tgl_selesai = $schoolYear->tgl_selesai;
        $this->status = $schoolYear->status;

    }

    public function submit()
    {
        $data = $this->validate();

        $schoolYear = SchoolYear::findOrFail($this->id);
        $schoolYear->update($data);

        session()->flash("success", "Berhasil memperbarui tahun ajaran baru periode {$this->periode}");
        return redirect()->to(route('year.edit', $this->id));
    }

    public function render()
    {
        $title = 'Edit Tahun Ajaran';

        return view('livewire.staff.admin.school-year.edit-year', compact('title'));
    }
}
