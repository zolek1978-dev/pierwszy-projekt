<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PytanieFaq extends Model
{
    protected $table = 'pytania_faq';

    protected $fillable = [
        'kategoria_faq_id',
        'pytanie',
        'odpowiedz',
        'kolejnosc',
        'czy_opublikowane',
    ];

    protected $casts = [
        'czy_opublikowane' => 'boolean',
    ];

    public function kategoria()
    {
        return $this->belongsTo(KategoriaFaq::class, 'kategoria_faq_id');
    }
}