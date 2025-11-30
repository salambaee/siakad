<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id_krs';
    public $timestamps = false;

    protected $fillable = [
        'nim',
        'id_jadwal',
        'semester',
        'tahun_ajaran',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
}