<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penitipan extends Model
{
    /** @use HasFactory<\Database\Factories\PentipanFactory> */
    use HasFactory;

    protected $table = 'penitipan';
    protected $fillable = [
        'user_id',
        'loker_id',
        'waktu_mulai',
        'waktu_selesai',
        'durasi_menit',
        'biaya',
        'status'
    ];

    public function loker()
    {
        return $this->belongsTo(Lokers::class);
    }
}
