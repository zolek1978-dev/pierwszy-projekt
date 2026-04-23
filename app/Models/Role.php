<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = [
        'nazwa',
        'slug',
        'opis',
        'czy_systemowa',
    ];

    public function uzytkownicy()
    {
        return $this->belongsToMany(User::class, 'uzytkownicy_role', 'rola_id', 'user_id');
    }

    public function uprawnienia()
    {
        return $this->belongsToMany(Uprawnienie::class, 'role_uprawnienia', 'rola_id', 'uprawnienie_id');
    }
}