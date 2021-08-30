<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStandardPillar extends Model
{
    protected $table = 'project_standard_pillars';
    protected $fillable = [
        'request_id',
        'standard_pillar_id',
        'project_manager_id'
    ];

    public function RequestByStandardPillar(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
    public function standardPillarByProject(){
        return $this->belongsTo('App\Standard_Pillar' , 'standard_pillar_id');
    }
    public function ManagerStandard(){
        return $this->belongsTo('App\Project' , 'project_manager_id');
    }
    
}
