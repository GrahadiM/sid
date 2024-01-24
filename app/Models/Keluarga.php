<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluargas';
    protected $guarded = [];

    public function kk() {
        return $this->belongsTo(KartuKeluarga::class);
    }

    public function penduduk() {
        return $this->belongsTo(Penduduk::class);
    }
}
