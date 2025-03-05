<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanItem extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_items';

    protected $fillable = [
        'peminjaman_id',
        'barang_id',
        'jumlah_barang'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
