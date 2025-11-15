<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    public $timestamps = false;
    protected $fillable = ['nama_prodi'];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_prodi', 'id_prodi');
    }
}