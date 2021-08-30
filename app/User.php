<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'first_name',
         'last_name',
         'email',
         'password' ,
         'phone' ,
         'birth_day' ,
         'country' ,
         'city' ,
         'company' ,
         'job_title' ,
         'admin_id'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userAdmin(){
        return $this->belongsTo('App\Admin');
    }
    public function user_project_maker(){
        return $this->hasMany('App\Project_Maker' , 'user_id' , 'id');
    }
    public function UserAdminMessageFile(){
        return $this->hasMany('App\File' , 'file_id' , 'id');
    }
    public function UserAdminMessage(){
        return $this->hasMany('App\AdminUserMessage' , 'user_id' , 'id');
    }
    public function courses(){
        return $this->belongsToMany('App\Course' , 'user_courses' , 'user_id' , 'course_id');
    }
    public function RequestUsers(){
        return $this->hasMany('App\Requesto' , 'user_id' , 'id');
    }
    public function RequestUsersDataFiles(){
        return $this->hasMany('App\DataFile' , 'user_id' , 'id');
    }
    public function MessageToMessagesFiles(){
        return $this->hasMany('App\MessageFile' , 'user_id' , 'id');
    }
    
}
