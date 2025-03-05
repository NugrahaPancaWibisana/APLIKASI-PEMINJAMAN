<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;

    protected $fillable = ['name', 'rfid', 'nip', 'no_wa', 'jabatan'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'people_id', 'id');
    }
}
