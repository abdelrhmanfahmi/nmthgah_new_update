<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeConsul extends Model
{
    protected $table = 'types_consuls';
    protected $fillable = [
        'name',
    ];
    
}
