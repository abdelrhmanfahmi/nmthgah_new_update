<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageFile extends Model
{
    protected $table = 'messages_files';
    protected $fillable = [
        'message',
        'files',
        'user_id',
        'admin_id',
        'request_id',
        'isAdmin'
    ];

    public function MessageToUser(){
        return $this->belongsTo('App\User' , 'user_id');
    }
    public function MessageToUserByRequest(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
    public function messagesToAdmin(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }
}
