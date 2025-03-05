<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    DB::table('peminjaman')->where('status', 'sedang dipinjam')
        ->whereRaw("DATE_ADD(tanggal_pinjam, INTERVAL lama_pinjam DAY) < ?", [Carbon::now()])
        ->update(['status' => 'belum dikembalikan']);
})->daily();
