<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriaWpisu extends Model
{
    protected $table = 'kategorie_wpisow';

    protected $fillable = [
        'nazwa',
        'slug',
        'opis',
    ];

    public function wpisy()
    {
        return $this->hasMany(Wpis::class, 'kategoria_wpisu_id');
    }
}