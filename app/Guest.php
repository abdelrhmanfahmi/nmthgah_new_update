<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'scientific_degree'
    ];

    public function courses(){
        return $this->belongsToMany('App\Course' , 'guest_courses' , 'guest_id' , 'course_id');
    }
}
