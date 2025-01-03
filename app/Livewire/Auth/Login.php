<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login Ke Aplikasi Monitoring Tugas Siswa')]
    #[Layout('components.layouts.auth')]

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password harus berisi 8 karakter.'
    ];

    public function check()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('Admin') || $user->hasRole('Guru')) {
                return redirect()->route('staff.dashboard'); 
            } else {
                return redirect()->route('student.dashboard'); 
            }
        } else {
            session()->flash('failed', 'Email atau password yang Anda masukkan tidak valid.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
