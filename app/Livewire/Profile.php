<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $isOpen = false;
    public $showPasswordModal = false;

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function openPasswordModal()
    {
        $this->isOpen = false;
        $this->dispatch('openPasswordModal');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('components.profile');
    }
}
