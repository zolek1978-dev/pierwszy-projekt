<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SekcjaKursu extends Model
{
    protected $table = 'sekcje_kursow';

    public function kurs()
    {
        return $this->belongsTo(Kurs::class);
    }

    public function lekcje()
    {
        return $this->hasMany(Lekcja::class, 'sekcja_kursu_id');
    }
}
