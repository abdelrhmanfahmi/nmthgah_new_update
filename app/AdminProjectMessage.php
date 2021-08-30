<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProjectMessage extends Model
{
    protected $table = 'admin_project_messages';
    protected $fillable = [
        'message',
        'admin_id',
        'project_id'
    ];
}
