<?php

namespace App\Livewire\Auth;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login Ke Aplikasi Monitoring Tugas Siswa')]
    #[Layout('components.layouts.auth')]

    public $nuptk_nis;
    public $password;

    protected $rules = [
        'nuptk_nis' => 'required',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'nuptk_nis.required' => 'NUPTK atau NIS wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password harus berisi 8 karakter.'
    ];

    public function check()
    {
        $this->validate();

        if (Auth::attempt(['nuptk_nis' => $this->nuptk_nis, 'password' => $this->password])) {
            session()->regenerate();

            $user = Auth::user();

            session()->flash('success', 'Selamat Datang Di Aplikasi SITUGAS');
            if ($user->hasRole('Admin') || $user->hasRole('Guru')) {
                $teacher = Teacher::where('user_id', $user->id)->first();
                $admin = Admin::where('user_id', $user->id)->first();

                if (($teacher && $teacher->status === 'Aktif') || ($admin && $admin->status === 'Aktif')) {
                    return redirect()->route('staff.dashboard');
                }

                Auth::logout(); 
                session()->invalidate(); 
                session()->regenerateToken();
                session()->flash('failed', 'Akses ditolak. Akun sedang tidak aktif, minta Admin untuk mengaktifkannya.');

                return redirect()->route('login'); 
            } else {
                $student = Student::where('user_id', $user->id)->first();
                if($student->status === 'Lulus'){
                    Auth::logout(); 
                    session()->invalidate(); 
                    session()->regenerateToken();
                    session()->flash('failed', 'Akses ditolak. Akun Anda sudah dinyatakan lulus.');

                    return redirect()->route('login'); 
                }

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
