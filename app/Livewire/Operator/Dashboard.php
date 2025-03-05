<?php

namespace App\Livewire\Operator;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Peminjaman MRC')]
    public function render()
    {
        return view('livewire.operator.dashboard');
    }
}
