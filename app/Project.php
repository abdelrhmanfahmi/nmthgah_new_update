<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Project extends Authenticatable
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
         'admin_id',
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

    // protected $table = 'projects';

   

    public function projectAdmin(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }

    public function project_manager_project_maker(){
        return $this->hasMany('App\ProjectMaker' , 'project_manager_id' , 'id');
    }
    public function adminsMessage(){
        return $this->belongsToMany('App\Admin');
    }
    public function projectPillar_ProjectManager(){
        return $this->hasMany('App\ProjectPillar' , 'project_manager_id' , 'id');
    }
    public function MessageFromtProjectManagerToConsultant(){
        return $this->hasMany('App\MessageFilesConsultantsProject' , 'project_manager_id' , 'id');
    }
}
