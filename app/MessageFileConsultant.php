<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageFileConsultant extends Model
{
    protected $table = 'messages_files_consultants';
    protected $fillable = [
        'message',
        'files',
        'consultant_id',
        'projectos_id',
        'project_manager_id',
        'pillar_id',
        'isManager'
    ];

    public function MessageToConsultant(){
        return $this->belongsTo('App\Consultant' , 'consultant_id');
    }
    public function MessageToConsultantRequest(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
    public function MessageToConsultantProjectManager(){
        return $this->belongsTo('App\Project' , 'project_manager_id');
    }
}
