<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Consultant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $table = 'consultants';

    protected $fillable = [
         'first_name',
         'last_name',
         'email',
         'password' ,
         'phone' ,
         'country' ,
         'city' ,
         'departement' ,
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

    public function consultantAdmin(){
        return $this->belongsTo('App\Admin');
    }

    public function consultantProject(){
        return $this->belongsTo('App\ProjectMaker' , 'project_id');
    }
    public function adminsMessage(){
        return $this->belongsToMany('App\Admin');
    }
    public function projectPillar_Consultant(){
        return $this->hasMany('App\ProjectPillar' , 'consultant_id' , 'id');
    }
    public function consultant_project_maker(){
        return $this->hasMany('App\ProjectMaker' , 'consultant_id' , 'id');
    }
    
    public function consultantPerRequests(){
        return $this->hasMany('App\Requesto' , 'consultant_id' , 'id');
    }
    
    public function consultantPerPillar(){
        return $this->hasMany('App\Pillar' , 'consultant_id' , 'id');
    }
    
    public function consultantReEvalutes(){
        return $this->hasMany('App\reEvalutes' , 'consultant_id' , 'id');
    }
    
    public function departementConsultantPillar(){
        return $this->belongsTo('App\Pillar' , 'departement');
    }
    
}
