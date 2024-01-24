<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    use HasFactory;

    protected $table = 'meninggals';
    protected $guarded = [];

    public function penduduk() {
        return $this->belongsTo(Penduduk::class);
    }
}
