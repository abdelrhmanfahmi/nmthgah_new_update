<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reEvalutes extends Model
{
    protected $table = 'reEvalutes';
    
    protected $fillable = ['pillar_id' , 'projectos_id' , 'consultant_id' , 'reason'];
    
    public function reEvalutesPillar(){
        return $this->belongsTo('App\Pillar' , 'pillar_id');
    }
    
    public function reEvalutesProject(){
        return $this->belongsTo('App\Projecto' , 'projectos_id');
    }
    
    public function reEvalutesConsultants(){
        return $this->belongsTo('App\Consultant' , 'consultant_id');
    }
}
