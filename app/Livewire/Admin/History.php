<?php

namespace App\Livewire\Admin;

use App\Models\Peminjaman;
use Livewire\Attributes\Title;
use Livewire\Component;

class History extends Component
{
    #[Title('History Admin MRC')]
    public function render()
    {
        $peminjaman = Peminjaman::with(['person', 'items.barang'])
            ->where('status', 'telah dikembalikan')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.history', [
            'peminjaman' => $peminjaman,
        ]);
    }
}
