<?php

namespace App\Livewire\Staff\Admin\Calendar;

use App\Models\Calendar;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCalendar extends Component
{
    #[Title('Buat Kalender Akademik')]
    #[Layout('components.layouts.staff')]

    public $judul;
    public $keterangan;
    public $tgl_mulai;
    public $tgl_selesai;

    public function rules()
    {
        return [
            'judul' => 'required|max:255|',
            'keterangan' => 'required|in:Libur,Kegiatan,Lainnya',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        Calendar::create($data);

        session()->flash('success', 'Berhasil menambahkan data kalender baru.');
        return redirect()->to(route('calendar.index'));
    }

    public function render()
    {
        $title = 'Buat Kalender Akademik';

        return view('livewire.staff.admin.calendar.create-calendar');
    }
}
