<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'question',
        'pillar_id'
    ];
    
    public function getPillars(){
        return $this->belongsTo('App\Pillar' , 'pillar_id');
    }
}
