<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = [
        'title', 'desc', 'trainer',
    ];

    protected $table='subjects';
}
