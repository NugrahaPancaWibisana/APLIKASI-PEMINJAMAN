<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard Admin MRC')]
    public function render()
    {
        $peminjaman = \App\Models\Peminjaman::with(['person', 'items.barang'])
            ->whereIn('status', ['sedang dipinjam', 'belum dikembalikan'])
            ->latest()
            ->paginate(5);

        return view('livewire.admin.dashboard', [
            'peminjaman' => $peminjaman,
        ]);
    }
}
