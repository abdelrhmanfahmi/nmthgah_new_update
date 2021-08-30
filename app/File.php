<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'files',
        'user_id',
        'message_id'
    ];

    public function FileUser(){
        return $this->belongsTo('App\User' , 'user_id');
    }
    public function AdminUserMessageFile(){
        return $this->belongsTo('App\AdminUserMessage' , 'message_id');
    }
}

