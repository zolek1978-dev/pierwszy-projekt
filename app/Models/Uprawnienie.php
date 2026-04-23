<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uprawnienie extends Model
{
    protected $table = 'uprawnienia';

    protected $fillable = [
        'nazwa',
        'slug',
        'opis',
        'czy_systemowe',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_uprawnienia', 'uprawnienie_id', 'rola_id');
    }
}
