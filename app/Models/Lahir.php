<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahir extends Model
{
    use HasFactory;

    protected $table = 'lahirs';
    protected $guarded = [];

    public function kk() {
        return $this->belongsTo(KartuKeluarga::class);
    }

    public function penduduk() {
        return $this->belongsTo(Penduduk::class);
    }
}
