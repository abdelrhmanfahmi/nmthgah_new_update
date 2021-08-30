<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement_Project extends Model
{
    protected $table = 'requirement__projects';
    protected $fillable = [
        'request_id' , 'requirement_standard_pillar_id' , 'project_manager_id'
    ];

    public function RequestByRequirementStandardPillar(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
    public function requirementStandardPillarByProject(){
        return $this->belongsTo('App\Requirement_Standard_Pillar' , 'requirement_standard_pillar_id');
    }
    public function ManagerRequirementStandard(){
        return $this->belongsTo('App\Project' , 'project_manager_id');
    }
}
