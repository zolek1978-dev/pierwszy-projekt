<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriaKursu extends Model
{
    protected $table = 'kategorie_kursow';

    protected $fillable = [
        'nazwa',
        'slug',
        'opis_krotki',
        'opis_pelny',
        'obrazek',
        'meta_title',
        'meta_description',
        'czy_aktywna',
        'kolejnosc',
    ];

    public function kursy()
    {
        return $this->hasMany(Kurs::class, 'kategoria_kursu_id');
    }
}