<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTypes extends Model
{
    protected $table = 'project_types';
    
    protected $fillable = ['projectos_id' , 'requirement_id' , 'standard_id' , 'consultant_id' ,   'target_value_type' , 'audit_result_type'];
    
    public function projectsByProject_Type(){
        return $this->belongsTo('App\Projecto' , 'projectos_id');
    }
    public function requirementsByProjectoTypes(){
        return $this->belongsTo('App\Requirement_Standard_Pillar' , 'requirement_id');
    }
    public function standardsByProjectoTypes(){
        return $this->belongsTo('App\Standard_Pillar' , 'standard_id');
    }
     public function consultantsByProjectoTypes(){
        return $this->belongsTo('App\Consultant' , 'consultant_id');
    }
}
