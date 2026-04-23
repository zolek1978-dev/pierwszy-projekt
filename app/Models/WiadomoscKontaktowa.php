<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WiadomoscKontaktowa extends Model
{
    protected $table = 'wiadomosci_kontaktowe';

    protected $fillable = [
        'imie',
        'nazwisko',
        'email',
        'telefon',
        'temat',
        'wiadomosc',
        'status',
        'ip_uzytkownika',
    ];
}