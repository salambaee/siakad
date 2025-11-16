<?php

namespace App\Models;

// app/Models/Dosen.php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = ['nidn', 'nama', 'id_prodi', 'keahlian', 'password', 'peran'];

    protected $hidden = ['password'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }
}
