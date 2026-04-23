<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strona extends Model
{
    protected $table = 'strony';

    protected $fillable = [
        'tytul',
        'slug',
        'tresc',
        'meta_title',
        'meta_description',
        'czy_opublikowana',
        'data_publikacji',
    ];

    protected $casts = [
        'czy_opublikowana' => 'boolean',
        'data_publikacji' => 'datetime',
    ];
}