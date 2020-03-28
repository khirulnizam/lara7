<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New2 extends Model
{
    //
    protected $fillable = [
        'name', 'department', 'dob',
    ];

    protected $table='new';
}
