<?php

namespace App\Livewire\Components;

use App\Models\SchoolYear;
use App\Models\Subject;
use Livewire\Component;

class SubjectTeacher extends Component
{
    public $tingkatan;
    public $namaKelas;
    public $hari;
    public $jamMasuk;
    public $jamKeluar;
    public $kelasId;

    protected $listeners = [
        'checkAvailability' => 'handleCheckAvailability'
    ];

   

    public function render()
    {
        $teachers = $this->checkSchedule(
            $this->tingkatan,
            $this->namaKelas,
            $this->hari,
            $this->jamMasuk,
            $this->jamKeluar,
            $this->kelasId,
        );

        return view('livewire.components.subject-teacher', compact('teachers'));
    }
}
