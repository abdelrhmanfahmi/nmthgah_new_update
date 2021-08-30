<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'image',
        'title',
        'desc',
        'admin_id'
    ];

}
