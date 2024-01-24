<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluargas';
    protected $guarded = [];

    public function penduduk() {
        return $this->belongsTo(Penduduk::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
