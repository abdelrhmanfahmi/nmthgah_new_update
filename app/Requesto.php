<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requesto extends Model
{
    protected $table = 'requests';
    protected $fillable = [
        'waqf_name',
        'waqf_ownerName',
        'waqf_charger',
        'city',
        'street',
        'phone',
        'desc',
        'user_id',
        'finishedProject',
        'finishedRequest',
        'statusRequest'
    ];
     public function Request_admin(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }
    
    public function usersRequest(){
        return $this->belongsTo('App\User' , 'user_id');
    }
    
     public function standard_pillars(){
        return $this->belongsToMany('App\Standard_Pillar');
    }
    
    public function pillars(){
        return $this->belongsToMany('App\Pillar' , 'project_pillars' , 'project_id' , 'pillar_id');
    }

    public function requirement_standard_pillars(){
        return $this->belongsToMany('App\Requirement_Standard_Pillar');
    }
    public function getFilesRequests(){
        return $this->hasMany('App\DataFile' , 'request_id' , 'id');
    }
    public function projectWithRequest(){
        return $this->hasOne('App\Projecto' , 'request_id' , 'id');
    }
    
    protected $dates = ['created_at' , 'updated_at'];
    
}
