<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'nim',
        'nama',
        'id_prodi',
        'angkatan',
    ];

    // Karena mahasiswa tidak punya kolom password di database,
    // kita override method ini untuk menggunakan NIM sebagai password
    public function getAuthPassword()
    {
        return $this->nim; // NIM sebagai password default
    }

    public function getAuthIdentifierName()
    {
        return 'nim';
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function krs()
    {
        return $this->hasMany(Krs::class, 'nim', 'nim');
    }
}