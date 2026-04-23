<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagWpisu extends Model
{
    protected $table = 'tagi_wpisow';

    protected $fillable = [
        'nazwa',
        'slug',
    ];

    public function wpisy()
    {
        return $this->belongsToMany(Wpis::class, 'wpisy_tagi', 'tag_wpisu_id', 'wpis_id');
    }
}