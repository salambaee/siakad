<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    public $timestamps = false;

    protected $fillable = [
        'nama_prodi',
        'jenjang',
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_prodi', 'id_prodi');
    }

    public function dosens()
    {
        return $this->hasMany(Dosen::class, 'id_prodi', 'id_prodi');
    }

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class, 'id_prodi', 'id_prodi');
    }
}