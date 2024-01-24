<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendatang extends Model
{
    use HasFactory;

    protected $table = 'pendatangs';
    protected $guarded = [];

    public function penduduk() {
        return $this->belongsTo(Penduduk::class);
    }
}
