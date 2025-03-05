<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;

    protected $fillable = ['image', 'nama', 'stok', 'tipe'];

    public function peminjamanItems(): HasMany
    {
        return $this->hasMany(PeminjamanItem::class);
    }
}
