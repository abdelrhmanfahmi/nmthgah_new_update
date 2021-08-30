<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pillar extends Model
{
    protected $table = 'pillars';
    
    protected $fillable = ['name'];

    public function pillarAdmin(){
        return $this->belongsTo('App\Admin');
    }
    public function pillarStandard_Pillar(){
        return $this->hasMany('App\Standard_Pillar' , 'pillar_id' , 'id');
    }
    public function pillar_project_maker(){
        return $this->hasMany('App\ProjectMaker' , 'pillar_id' , 'id');
    }

    public function project_makers(){
        return $this->belongsToMany('App\ProjectMaker' , 'project_pillars' , 'pillar_id' , 'project_id');
    }
    
    public function pillarReEvalutes(){
        return $this->hasMany('App\reEvalutes' , 'pillar_id' , 'id');
    }
    
    public function pillarDepartementConsultant(){
        return $this->hasMany('App\Consultant' , 'departement' , 'id');
    }
    
    public function projectoPillarsFromPillars(){
        return $this->hasMany('App\ProjectoPillar' , 'pillar_id' , 'id');
    }
    public function ProjectResultsWithItsPillar(){
        return $this->hasMany('App\ProjectResult' , 'pillar_id' , 'id');
    }
    public function GetQuestionsForPillars(){
        return $this->hasMany('App\Question' , 'pillar_id' , 'id');
    }
}
