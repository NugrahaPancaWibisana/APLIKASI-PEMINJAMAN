<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PeminjamanExport implements FromView
{
    public function view(): View
    {
        $counter = 0;
        $peminjaman = Peminjaman::with(['person', 'items.barang'])
            ->whereIn('status', ['sedang dipinjam', 'belum dikembalikan'])
            ->latest();

        return view('layouts.export-peminjaman', compact('peminjaman', 'counter'));
    }
}
