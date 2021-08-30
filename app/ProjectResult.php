<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectResult extends Model
{
    protected $table = 'project_results';
    
    protected $fillable = [
        'standard',
        'requirement',
        'audit_result',
        'likes',
        'gap_size',
        'target_value_type',
        'requirement_id',
        'standard_id',
        'request_id',
        'projectos_id',
        'pillar_id',
        'consultant_id'
        ];
        
        public function getStandardIdFromProjectResults(){
            return $this->belongsTo('App\Standard_Pillar' , 'standard_id');
        }
        
        public function getPillarsFromProjectResult(){
            return $this->belongsTo('App\Pillar' , 'pillar_id');
        }
        
        public function getConsultants(){
            return $this->belongsTo('App\Consultant' , 'consultant_id');
        }
}
