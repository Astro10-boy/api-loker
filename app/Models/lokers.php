<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokers extends Model
{
    /** @use HasFactory<\Database\Factories\LokersFactory> */
    use HasFactory;

    protected $fillable = ['nomor_loker', 'status'];

    public function penitipan()
    {
        return $this->hasMany(Penitipan::class);
    }
    
}
