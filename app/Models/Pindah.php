<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    use HasFactory;

    protected $table = 'pindahs';
    protected $guarded = [];

    public function penduduk() {
        return $this->belongsTo(Penduduk::class);
    }
}
