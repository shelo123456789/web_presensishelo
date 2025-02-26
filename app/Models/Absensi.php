<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'user_id',
        'tanggal',
        'waktu_datang',
        'waktu_pulang',
        'keterangan', 
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

