<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard_Pillar extends Model
{
    protected $table = 'standard__pillars';

    protected $fillable = [
        'standard_name',
        'pillar_id'
    ];

    public function standard_pillar_Pillar(){
        return $this->belongsTo('App\Pillar' , 'pillar_id');
    }

    public function standard_pillar_Requirement_Standard_Pillar(){
        return $this->hasMany('App\Requirement_Standard_Pillar' , 'standard_pillar_id' , 'id');
    }

    public function project_makers(){
        return $this->belongsToMany('App\ProjectMaker');
    }
    
    public function standardPillarToProjectResults(){
        return $this->hasMany('App\ProjectResult' , 'standard_id' , 'id');
    }
    public function projectTypesStandards(){
        return $this->hasMany('App\ProjectTypes' , 'standard_id' , 'id');
    }
}
