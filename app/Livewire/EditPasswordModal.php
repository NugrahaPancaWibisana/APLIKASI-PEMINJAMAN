<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditPasswordModal extends Component
{
    public $isOpen = false;
    public $password;
    public $password_confirmation;

    protected $listeners = ['openPasswordModal' => 'open'];

    public function open()
    {
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
        $this->reset(['password', 'password_confirmation']);
    }

    protected $rules = [
        'password' => 'required|min:8|confirmed',
    ];

    public function updatePassword()
    {
        $this->validate();


        auth()->user()->update([
            'password' => Hash::make($this->password)
        ]);

        $this->close();
        $this->dispatch('notify', 'Berhasil mengupdate password!', 'success');
    }

    public function render()
    {
        return view('components.edit-password-modal');
    }
}
