<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dosen extends Authenticatable
{
    use Notifiable;

    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = true; // DIPERBAIKI: Sesuai dengan migration

    protected $fillable = [
        'nidn',
        'nama',
        'id_prodi',
        'keahlian',
        'password',
        'peran',
    ];

    protected $hidden = [
        'password',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'nidn', 'nidn');
    }

    // Method untuk authentication
    public function getAuthIdentifierName()
    {
        return 'nidn';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}