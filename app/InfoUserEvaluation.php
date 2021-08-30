<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUserEvaluation extends Model
{
    protected $table = 'info_users_evaluation';
    protected $fillable = [
        'name',
        'email',
        'waqf',
        'city',
        'description'
    ];
    
}
