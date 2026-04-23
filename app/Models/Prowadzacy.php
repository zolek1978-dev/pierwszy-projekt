<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prowadzacy extends Model
{
    protected $table = 'prowadzacy';

    protected $fillable = [
        'user_id',
        'slug',
        'tytul',
        'opis_krotki',
        'opis_pelny',
        'zdjecie',
        'specjalizacja',
        'doswiadczenie_lata',
        'facebook',
        'linkedin',
        'youtube',
        'strona_www',
        'czy_publiczny',
        'kolejnosc',
    ];

    protected $casts = [
        'czy_publiczny' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kursy()
    {
        return $this->hasMany(Kurs::class, 'prowadzacy_id');
    }
}