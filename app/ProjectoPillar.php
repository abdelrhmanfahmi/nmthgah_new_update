<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectoPillar extends Model
{
    protected $table = 'projecto_pillars';
    
    protected $fillable = ['projectos_id' , 'pillar_id' , 'consultant_id' , 'resultConsul'];
    
    public function projectsByProject_Pillar(){
        return $this->belongsTo('App\Projecto' , 'projectos_id');
    }
    public function pillarsByRequest_Pillar(){
        return $this->belongsTo('App\Pillar' , 'pillar_id');
    }
    public function consultantsProjectoPillar(){
        return $this->belongsTo('App\Consultant' , 'consultant_id');
    }
}
