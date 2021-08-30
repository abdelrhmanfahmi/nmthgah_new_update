<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
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

    public function adminPillar(){
        return $this->hasMany('App\Pillar' , 'admin_id' , 'id');
    }
    public function adminUser(){
        return $this->hasMany('App\User' , 'admin_id' , 'id');
    }
    public function adminProject(){
        return $this->hasMany('App\Project' , 'admin_id' , 'id');
    }
    public function adminConsultant(){
        return $this->hasMany('App\Consultant' , 'admin_id' , 'id');
    }
    public function admin_project_maker(){
        return $this->hasMany('App\Project_Maker' , 'admin_id' , 'id');
    }
    public function AdminUserMessages(){
        return $this->hasMany('App\AdminUserMessage' , 'admin_id' , 'id');
    }
    public function projectsMessage(){
        return $this->belongsToMany('App\Project');
    }
    public function consultantsMessage(){
        return $this->belongsToMany('App\Consultant');
    }
    public function adminCourses(){
        return $this->hasMany('App\Course' , 'admin_id' , 'id');
    }
    public function adminIndicator(){
        return $this->hasMany('App\Indicator' , 'admin_id' , 'id');
    }
    public function getMessagesFromUser(){
        return $this->hasMany('App\MessageFile' , 'user_id' , 'id');
    }
}
