<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lekcja extends Model
{
    protected $table = 'lekcje';

    public function kurs()
    {
        return $this->belongsTo(Kurs::class);
    }

    public function sekcja()
    {
        return $this->belongsTo(SekcjaKursu::class, 'sekcja_kursu_id');
    }

    public function materialy()
    {
        return $this->hasMany(MaterialLekcji::class, 'lekcja_id');
    }
}
