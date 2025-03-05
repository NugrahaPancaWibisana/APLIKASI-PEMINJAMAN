<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class AdminCards extends Component
{
    public function render()
    {
        $totalBarang = \App\Models\Peminjaman::sum('total_barang');
        $barangBelumDikembalikan = \App\Models\Peminjaman::where('status', 'belum dikembalikan')->sum('total_barang');
        $barangDipinjamHariIni = \App\Models\Peminjaman::whereDate('tanggal_pinjam', Carbon::today())->sum('total_barang');
        $totalGuruPeminjam = \App\Models\Peminjaman::distinct('people_id')->count('people_id');

        return view('components.admin-cards', [
            'totalBarang' => $totalBarang,
            'barangBelumDikembalikan' => $barangBelumDikembalikan,
            'barangDipinjamHariIni' => $barangDipinjamHariIni,
            'totalGuruPeminjam' => $totalGuruPeminjam,
        ]);
    }
}
