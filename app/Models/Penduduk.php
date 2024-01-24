<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduks';
    protected $guarded = [];

    public function kk() {
        return $this->belongsTo(KartuKeluarga::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
