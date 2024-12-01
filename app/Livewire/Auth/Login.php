<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login Ke Aplikasi SIAKAD')]
    #[Layout('components.layouts.auth')]

    public function render()
    {
        return view('livewire.auth.login');
    }
}
