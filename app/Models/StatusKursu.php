<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKursu extends Model
{
    protected $table = 'statusy_kursow';

    protected $fillable = [
        'nazwa',
        'slug',
        'opis',
        'czy_publiczny',
        'kolejnosc',
    ];

    public function kursy()
    {
        return $this->hasMany(Kurs::class, 'status_kursu_id');
    }
}