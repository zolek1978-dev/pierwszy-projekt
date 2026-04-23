<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoziomKursu extends Model
{
    protected $table = 'poziomy_kursow';

    protected $fillable = [
        'nazwa',
        'slug',
        'opis',
        'kolejnosc',
    ];

    public function kursy()
    {
        return $this->hasMany(Kurs::class, 'poziom_kursu_id');
    }
}