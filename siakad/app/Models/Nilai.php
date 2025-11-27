<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    public $timestamps = false;

    protected $fillable = [
        'id_krs',
        'nilai_huruf',
        'nilai_angka',
    ];

    public function krs()
    {
        return $this->belongsTo(Krs::class, 'id_krs', 'id_krs');
    }
}