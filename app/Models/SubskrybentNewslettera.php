<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubskrybentNewslettera extends Model
{
    protected $table = 'subskrybenci_newslettera';

    protected $fillable = [
        'email',
        'imie',
        'status',
        'zgoda_marketingowa',
        'data_zapisu',
        'data_wypisu',
    ];

    protected $casts = [
        'zgoda_marketingowa' => 'boolean',
        'data_zapisu' => 'datetime',
        'data_wypisu' => 'datetime',
    ];
}