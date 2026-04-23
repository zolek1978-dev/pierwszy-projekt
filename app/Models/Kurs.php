<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kurs extends Model
{
    use SoftDeletes;

    protected $table = 'kursy';

    protected $fillable = [
        'kategoria_kursu_id',
        'prowadzacy_id',
        'poziom_kursu_id',
        'status_kursu_id',
        'tytul',
        'slug',
        'podtytul',
        'opis_krotki',
        'opis_pelny',
        'dla_kogo',
        'czego_sie_nauczysz',
        'wymagania_wstepne',
        'miniatura',
        'obrazek_glowny',
        'jezyk',
        'czas_trwania_minuty',
        'liczba_lekcji',
        'cena',
        'cena_promocyjna',
        'czy_darmowy',
        'czy_wyrozniony',
        'czy_bestseller',
        'czy_nowy',
        'data_publikacji',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'czy_darmowy' => 'boolean',
        'czy_wyrozniony' => 'boolean',
        'czy_bestseller' => 'boolean',
        'czy_nowy' => 'boolean',
        'data_publikacji' => 'datetime',
        'cena' => 'decimal:2',
        'cena_promocyjna' => 'decimal:2',
    ];

    public function kategoria()
    {
        return $this->belongsTo(KategoriaKursu::class, 'kategoria_kursu_id');
    }

    public function prowadzacy()
    {
        return $this->belongsTo(Prowadzacy::class, 'prowadzacy_id');
    }

    public function poziom()
    {
        return $this->belongsTo(PoziomKursu::class, 'poziom_kursu_id');
    }

    public function status()
    {
        return $this->belongsTo(StatusKursu::class, 'status_kursu_id');
    }

    public function tagi()
    {
        return $this->belongsToMany(TagKursu::class, 'kursy_tagi', 'kurs_id', 'tag_kursu_id');
    }

    public function sekcje()
    {
        return $this->hasMany(SekcjaKursu::class, 'kurs_id');
    }

    public function lekcje()
    {
        return $this->hasMany(Lekcja::class, 'kurs_id');
    }
}