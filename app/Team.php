<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'image',
        'name',
        'title',
        'desc',
        'twitter',
        'email',
        'admin_id'
    ];
}
