<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Chart extends Component
{
    public function render()
    {
        $peminjamanStats = \App\Models\Peminjaman::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $dates = [];
        $peminjamanData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[] = Carbon::now()->subDays($i)->translatedFormat('D, j');

            $found = $peminjamanStats->firstWhere('date', $date);
            $peminjamanData[] = $found ? $found->total : 0;
        }

        return view('components.chart', [
            'dates' => $dates,
            'peminjamanData' => $peminjamanData,
        ]);
    }
}
