<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    protected $table = 'user_courses';
    protected $fillable = [
        'user_id',
        'course_id',
        'bankImage',
        'isSubmit',
        'isChecked',
        'scientific_degree'
    ];
    public function courses(){
        return $this->belongsTo('App\Course' , 'course_id');
    }
    public function users(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
