<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUserMessage extends Model
{
    protected $table = 'admin_user_messages';
    protected $fillable = [
        'message',
        'admin_id',
        'user_id'
    ];

    public function AdminUserMessage(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }
    public function UserAdminMessage(){
        return $this->belongsTo('App\User' , 'user_id');
    }
    public function fileAdminUserMessage(){
        return $this->hasMany('App\File' , 'message_id' , 'id');
    }
    
}
