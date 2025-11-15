<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = ['nim', 'nama', 'id_prodi', 'angkatan'];

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }
}
