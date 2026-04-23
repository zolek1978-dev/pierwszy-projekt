<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilUzytkownika extends Model
{
    protected $table = 'profile_uzytkownikow';

    protected $fillable = [
        'user_id',
        'imie',
        'nazwisko',
        'telefon',
        'avatar',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
