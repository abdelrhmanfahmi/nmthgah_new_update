<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestCourse extends Model
{
    protected $table = 'guest_courses';
    protected $fillable= [
        'isSubmit',
        'isChecked',
        'bankImage',
        'guest_id',
        'course_id'
    ];

    public function courses(){
        return $this->belongsTo('App\Course' , 'course_id');
    }
    public function guests(){
        return $this->belongsTo('App\Guest' , 'guest_id');
    }

}
