<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    public $incrementing = false; // karena NIDN bukan auto-increment
    protected $keyType = 'string'; // atau 'int' kalau nidn INT/BIGINT

    protected $fillable = ['nidn', 'nama', 'id_prodi', 'keahlian', 'password', 'peran'];

    // Relasi ke Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }
}
