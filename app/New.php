<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New extends Model
{
    //
    protected $fillable = [
        'name', 'department', 'dob',
    ];
}
