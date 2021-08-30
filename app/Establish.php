<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establish extends Model
{
    protected $table = 'establishes';
    protected $fillable = [
        'name',
        'email',
        'waqf',
        'city',
        'description'
    ];
    
}
