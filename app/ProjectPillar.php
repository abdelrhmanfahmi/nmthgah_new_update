<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPillar extends Model
{
    protected $table = 'project_pillars';
    protected $fillable = [
        'request_id' , 'pillar_id' , 'project_manager_id'
    ];

    public function RequestByPillar(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
    public function pillarByRequest(){
        return $this->belongsTo('App\Pillar' , 'pillar_id');
    }
    public function Manager(){
        return $this->belongsTo('App\Project' , 'project_manager_id');
    }
}
