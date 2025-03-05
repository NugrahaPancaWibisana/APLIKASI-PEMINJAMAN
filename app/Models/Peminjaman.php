<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;

    protected $table = 'peminjamen';

    protected $fillable = [
        'people_id',
        'status',
        'tanggal_pinjam',
        'lama_pinjam',
        'tanggal_kembali',
        'keperluan',
        'total_barang'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(PeminjamanItem::class, 'peminjaman_id', 'id');
    }
}
