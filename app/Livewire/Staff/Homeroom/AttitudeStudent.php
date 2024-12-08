<?php

namespace App\Livewire\Staff\Homeroom;

use App\Models\AttitudeReport;
use App\Models\SchoolYear;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AttitudeStudent extends Component
{
    #[Title('Nilai Sikap Siswa')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $predikat_spiritual;
    #[Validate]
    public $deskripsi_spiritual;
    #[Validate]
    public $predikat_sosial;
    #[Validate]
    public $deskripsi_sosial;

    public $studentID;

    public function mount($id)
    {
        $student = Student::findOrFail($id);
        $report = AttitudeReport::where('siswa_id', $id)->first();

        $this->studentID = $student->id;

        $this->predikat_spiritual = $report->predikat_spiritual ?? '';
        $this->deskripsi_spiritual = $report->deskripsi_spiritual ?? '';
        $this->predikat_sosial = $report->predikat_sosial ?? '';
        $this->deskripsi_sosial = $report->deskripsi_sosial ?? '';
    }

    public function rules()
    {
        return [
            'predikat_spiritual' => 'required|in:SANGAT BAIK,BAIK,CUKUP,BURUK',
            'deskripsi_spiritual' => 'required',
            'predikat_sosial' => 'required|in:SANGAT BAIK,BAIK,CUKUP,BURUK',
            'deskripsi_sosial' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        $schoolYear = SchoolYear::where('status', 'Aktif')->first();

        $data['siswa_id'] = $this->studentID;
        $data['tahun_ajaran_id'] = $schoolYear->id;

        AttitudeReport::create($data);

        session()->flash('success', 'Berhasil menyimpan nilai sikap');
        return redirect()->to(route('homeroom.attitude', $this->studentID));
    }

    public function render()
    {
        $title = 'Nilai Sikap Siswa';

        return view('livewire.staff.homeroom.attitude-student', compact('title'));
    }
}
