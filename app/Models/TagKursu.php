<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagKursu extends Model
{
    protected $table = 'tagi_kursow';

    protected $fillable = [
        'nazwa',
        'slug',
    ];

    public function kursy()
    {
        return $this->belongsToMany(Kurs::class, 'kursy_tagi', 'tag_kursu_id', 'kurs_id');
    }
}