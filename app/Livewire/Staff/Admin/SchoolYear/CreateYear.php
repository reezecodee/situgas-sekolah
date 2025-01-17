<?php

namespace App\Livewire\Staff\Admin\SchoolYear;

use App\Models\SchoolYear;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateYear extends Component
{
    #[Title('Buat Tahun Ajaran Baru')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $periode;
    #[Validate]
    public $semester;
    #[Validate]
    public $tgl_mulai;
    #[Validate]
    public $tgl_selesai;

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

    public function submit()
    {
        $data = $this->validate();

        SchoolYear::create($data);

        session()->flash("success", "Berhasil menambahkan tahun ajaran baru periode {$this->periode}");
        return redirect()->to(route('year.list'));
    }

    public function render()
    {
        $title = 'Buat Tahun Ajaran Baru';

        return view('livewire.staff.admin.school-year.create-year', compact('title'));
    }
}
