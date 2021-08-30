<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'courseName',
        'instructor',
        'instructorDesc',
        'instructorImage',
        'pillars',
        'price',
        'courseTime',
        'courseDate',
        'payment_method',
        'image_bank',
        'international_account',
        'local_account',
        'admin_id'
    ];

    public function courseAdmins(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }
    public function users(){
        return $this->belongsToMany('App\User' , 'user_courses' , 'course_id' , 'user_id');
    }
    public function guests(){
        return $this->belongsToMany('App\Guest' , 'guest_courses' , 'course_id' , 'guest_id');
    }
}
