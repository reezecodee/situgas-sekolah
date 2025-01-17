<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChangePassword extends Component
{
    #[Validate]
    public $current_password, $new_password, $new_password_confirmation;

    public function rules()
    {
        return [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'new_password_confirmation' => 'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Password saat ini harap di isi.',
            'new_password.required' => 'Password baru harap di isi.',
            'new_password.min' => 'Password minimal berisi 8 karakter.',
            'new_password_confirmation.required' => 'Konfirmasi password harap di isi.',
            'new_password_confirmation.same' => 'Konfirmasi password tidak sama.',
        ];
    }

    public function changePassword()
    {
        $this->validate();
        $user = Auth::user();

        if (!Hash::check($this->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        $user->password = Hash::make($this->new_password);
        $user->save();

        session()->flash('success', 'Password berhasil di perbarui.');

        if($user->hasRole('Admin') || $user->hasRole('Guru')){
            return redirect()->to(route('staff.profile'));
        }

        return redirect()->to(route('student.profile'));
    }
    
    public function render()
    {
        return view('livewire.components.change-password');
    }
}
