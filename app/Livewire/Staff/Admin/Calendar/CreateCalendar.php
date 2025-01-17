<?php

namespace App\Livewire\Staff\Admin\Calendar;

use App\Models\Calendar;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCalendar extends Component
{
    #[Title('Buat Kalender Akademik')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $judul, $keterangan, $tgl_mulai, $tgl_selesai;

    public function rules()
    {
        return [
            'judul' => 'required|max:255|',
            'keterangan' => 'required|in:Libur,Kegiatan,Lainnya',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'keterangan.required' => 'Keterangan wajib dipilih.',
            'keterangan.in' => 'Keterangan harus berupa salah satu dari: Libur, Kegiatan, atau Lainnya.',
            'tgl_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tgl_mulai.date' => 'Tanggal mulai harus berupa format tanggal yang valid.',
            'tgl_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tgl_selesai.date' => 'Tanggal selesai harus berupa format tanggal yang valid.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
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
        return view('livewire.staff.admin.calendar.create-calendar');
    }
}
