<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    use HasFactory;

    protected $table = 'penitipan';

    // tambahkan field sesuai data baru, hilangkan user_id kalau gak dipakai lagi
    protected $fillable = [
        'nama',
        'rfid',
        'loker_id',
        'waktu_mulai',
        'waktu_selesai',
        'durasi_menit',
        'biaya',
        'status', // kalau status masih dipakai
    ];

    public function loker()
    {
        return $this->belongsTo(Lokers::class, 'loker_id');
    }
}
