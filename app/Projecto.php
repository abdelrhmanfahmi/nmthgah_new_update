<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    protected $table = 'projectos';
    protected $fillable = [
        'request_id',
        'user_id',
        'project_id',
        'finishedProjectActual'
    ];
     public function Request_admin(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }
    public function usersProjecto(){
        return $this->belongsTo('App\User' , 'user_id');
    }
    // public function consultantsProjecto(){
    //     return $this->belongsTo('App\Consultant' , 'consultant_id');
    // }
    public function projectManagersProjecto(){
        return $this->belongsTo('App\Project' , 'project_id');
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
    
    public function requestPillarByRequest(){
        return $this->hasMany('App\ProjectoPillar' , 'projectos_id' , 'id');
    }
    
    public function RequestoReEvalutes(){
        return $this->hasMany('App\reEvalutes' , 'projectos_id' , 'id');
    }
    public function ProjectoRequests(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
    public function projectTypesProjectos(){
        return $this->hasMany('App\ProjectTypes' , 'projectos_id' , 'id');
    }
    public function projectResultProjectos(){
        return $this->hasMany('App\ProjectResult' , 'projectos_id' , 'id');
    }
    
}
