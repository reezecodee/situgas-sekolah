<?php

namespace App\Livewire\Staff\Notification;

use App\Models\Notification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SendNotif extends Component
{
    #[Title('Kirim Notifikasi')]
    #[Layout('components.layouts.staff')]

    #[Validate]
    public $penerima_id;
    #[Validate]
    public $judul;
    #[Validate]
    public $pesan;

    public $users;

    public function mount(){
       
    }

    public function rules()
    {
        return [
            'penerima_id' => 'required',
            'judul' => 'required|max:255',
            'pesan' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        Notification::create([
            'penerima_id' => $data['penerima_id'],
            'judul' => $data['judul'],
            'pesan' => $data['pesan'],
            'tanggal' => date('Y-m-d'),
            'status' => 'Belum dilihat'
        ]);

        session()->flash('success', 'Berhasil mengirimkan notifikasi');
        return redirect()->to(route('staff.notification'));
    }

    public function render()
    {
        $title = 'Kirim Notifikasi';

        return view('livewire.staff.notification.send-notif', compact('title'));
    }
}
