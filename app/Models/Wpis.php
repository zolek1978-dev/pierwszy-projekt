<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wpis extends Model
{
    protected $table = 'wpisy';

    protected $fillable = [
        'autor_id',
        'kategoria_wpisu_id',
        'tytul',
        'slug',
        'zajawka',
        'tresc',
        'obrazek',
        'status',
        'data_publikacji',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'data_publikacji' => 'datetime',
    ];

    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    public function kategoria()
    {
        return $this->belongsTo(KategoriaWpisu::class, 'kategoria_wpisu_id');
    }

    public function tagi()
    {
        return $this->belongsToMany(TagWpisu::class, 'wpisy_tagi', 'wpis_id', 'tag_wpisu_id');
    }
}