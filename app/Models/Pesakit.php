<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesakit extends Model
{
    use HasFactory;

    // Jika nama table BUKAN dalam ejaan plural kepada nama Model ini,
    // maka maklumkan kepada model nama table yang sebenar
    protected $table = 'pesakit';

    protected $fillable = [
        'nama_pesakit',
        'no_kp',
        'tarikh_lahir',
        'jantina_id',
        'alamat'
    ];

    // Mutators
    // Modify data yang diambil dari column nama_pesakit
    public function getNamaPesakitAttribute($value)
    {
        return ucwords($value);
    }

    public function jantina()
    {
        return $this->belongsTo(Jantina::class, 'jantina_id');
    }
}
