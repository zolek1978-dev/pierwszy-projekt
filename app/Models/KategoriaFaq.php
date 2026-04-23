<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriaFaq extends Model
{
    protected $table = 'kategorie_faq';

    protected $fillable = [
        'nazwa',
        'slug',
        'kolejnosc',
    ];

    public function pytania()
    {
        return $this->hasMany(PytanieFaq::class, 'kategoria_faq_id');
    }
}