<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kode_mk',
        'id_prodi',
        'nama_mk',
        'sks',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kode_mk', 'kode_mk');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'kode_mk', 'kode_mk');
    }
}