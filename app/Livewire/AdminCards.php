<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Peminjaman;

class AdminCards extends Component
{
    public function render()
    {
        $totalBarang = Peminjaman::where('status', '!=', 'telah dikembalikan')->sum('total_barang');
        $barangBelumDikembalikan = Peminjaman::where('status', 'belum dikembalikan')->sum('total_barang');
        $totalGuruPeminjam = Peminjaman::where('status', '!=', 'telah dikembalikan')->distinct()->count('people_id');

        return view('components.admin-cards', [
            'totalBarang' => number_format($totalBarang),
            'barangBelumDikembalikan' => number_format($barangBelumDikembalikan),
            'totalGuruPeminjam' => number_format($totalGuruPeminjam),
        ]);
    }
}