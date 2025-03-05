<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;

    public function login()
    {
        $credentials = $this->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $redirectUrl = Auth::user()->role === 'admin' 
                ? route('admin.dashboard') 
                : route('operator.dashboard');
        
            return redirect()->to($redirectUrl);
        };        

        $this->dispatch('notify', 'Gagal melakukan login!', 'error');
    }

    #[Title('Login MRC')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
