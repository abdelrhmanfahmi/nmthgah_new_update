<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilesConsultant extends Model
{
    protected $table = 'files_consultants';
    protected $fillable = [
        'files',
        'consultant_id',
        'request_id',
        'pillar_id'
    ];
    public function filesConsultantToConsultant(){
        return $this->belongsTo('App\Consultant' , 'consultant_id');
    }
    public function filesConsultantToPillar(){
        return $this->belongsTo('App\Pillar' , 'pillar_id');
    }
}