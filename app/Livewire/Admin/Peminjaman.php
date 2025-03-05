<?php

namespace App\Livewire\Admin;

use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Attributes\Title;
use Livewire\Component;

class Peminjaman extends Component
{
    public function export()
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }

    #[Title('Peminjaman Admin MRC')]
    public function render()
    {
        $peminjaman = \App\Models\Peminjaman::with(['person', 'items.barang'])
            ->whereIn('status', ['sedang dipinjam', 'belum dikembalikan'])
            ->latest()
            ->paginate(10);

        return view('livewire.admin.peminjaman', [
            'peminjaman' => $peminjaman,
        ]);
    }
}
