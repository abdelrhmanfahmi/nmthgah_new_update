<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement_Standard_Pillar extends Model
{
    protected $table = 'requirement__standard__pillars';

    protected $fillable = [
        'name',
        'explain',
        'measure_cursor',
        'indicator_estimation_method',
        'models',
        'standard_pillar_id'
    ];

    public function requirement_standard_pillar_Standard_Pillar(){
        return $this->belongsTo('App\Standard_Pillar' , 'standard_pillar_id');
    }

    public function requirement_standard_pillar_project_maker(){
        return $this->hasMany('App\Project_Maker' , 'requirement_standard_pillar_id' , 'id');
    }

    public function project_makers(){
        return $this->belongsToMany('App\ProjectMaker');
    }
    public function projectTypesRequirements(){
        return $this->hasMany('App\ProjectTypes' , 'requirement_id' , 'id');
    }
    
}