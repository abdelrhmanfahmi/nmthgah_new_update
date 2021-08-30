<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminConsultantMessage extends Model
{
    protected $table = 'admin_consultant_messages';
    protected $fillable = [
        'message',
        'admin_id',
        'consultant_id'
    ];
}
