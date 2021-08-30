<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsulManage extends Model
{
    protected $table = 'consul_manages';
    protected $fillable = [
        'name',
        'email',
        'city',
        'type',
    ];
    
}
