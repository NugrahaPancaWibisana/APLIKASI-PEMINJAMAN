<?php

use App\Livewire\Login;
use App\Livewire\Admin\Person;
use App\Livewire\Admin\Barang;
use App\Livewire\Admin\History;
use App\Livewire\Operator\Pengembalian;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Peminjaman as PeminjamanAdmin;
use App\Livewire\Operator\Dashboard as OperatorDashboard;
use App\Livewire\Operator\Peminjaman as PeminjamanOperator;

Route::get('/', Login::class)->name('login')->middleware('guest');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/barang', Barang::class)->name('admin.barang');
    Route::get('/guru', Person::class)->name('admin.guru');
    Route::get('/peminjaman', PeminjamanAdmin::class)->name('admin.peminjaman');
    Route::get('/riwayat', History::class)->name('admin.history');
});

Route::middleware(['auth', 'role:operator'])->prefix('operator')->group(function () {
    Route::get('/dashboard', OperatorDashboard::class)->name('operator.dashboard');
    Route::get('/peminjaman', PeminjamanOperator::class)->name('operator.peminjaman');
    Route::get('/pengembalian', Pengembalian::class)->name('operator.pengembalian');
});
