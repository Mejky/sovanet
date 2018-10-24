<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model



{
    public $timestamps = false;

    protected $fillable = [
        'first_name', 'last_name',
    ];

}
