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

    public $schoolYearId;

    #[Validate]
    public $periode, $semester, $tgl_mulai, $tgl_selesai;

    public function rules()
    {
        return [
            'periode' => 'required|string|min:9|max:9',
            'semester' => 'required|string|in:Ganjil,Genap',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'periode.required' => 'Periode wajib di isi.',
            'periode.min' => 'Periode harus berisi 9 karakter contoh: 2024/2025',
            'periode.max' => 'Periode harus berisi 9 karakter contoh: 2024/2025',
            'semester.required' => 'Harap pilih semester',
            'semester.in' => 'Semeter harus berisi Ganjil atau Genap',
            'tgl_mulai.required' => 'Harap masukkan tanggal mulai tahun ajaran',
            'tgl_mulai.date' => 'Harap masukkan format tanggal',
            'tgl_selesai.required' => 'Harap masukkan tanggal selesai tahun ajaran',
            'tgl_selesai.date' => 'Harap masukkan format tanggal', 
        ];
    }

    public function mount($schoolYearId){
        $this->schoolYearId = $schoolYearId;
        $schoolYear = SchoolYear::findOrFail($this->schoolYearId);

        $this->periode = $schoolYear->periode;
        $this->semester = $schoolYear->semester;
        $this->tgl_mulai = $schoolYear->tgl_mulai;
        $this->tgl_selesai = $schoolYear->tgl_selesai;
    }

    public function submit()
    {
        $data = $this->validate();

        $schoolYear = SchoolYear::findOrFail($this->schoolYearId);
        $schoolYear->update($data);

        session()->flash("success", "Berhasil memperbarui tahun ajaran baru periode {$this->periode}");
        return redirect()->to(route('year.edit', $this->schoolYearId));
    }

    public function render()
    {
        $title = 'Edit Tahun Ajaran';

        return view('livewire.staff.admin.school-year.edit-year', compact('title'));
    }
}
