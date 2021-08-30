<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultService extends Model
{
    protected $table = 'results_services';
    protected $fillable = [
        'result',
        'question_id',
        'info_user_id'
    ];
    
    public function getQuestions(){
        return $this->belongsTo('App\Question' , 'question_id');
    }
    public function getUserOfResults(){
        return $this->belongsTo('App\InfoUserEvaluation' , 'info_user_id');
    }
    
}
