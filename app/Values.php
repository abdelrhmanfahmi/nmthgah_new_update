<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    protected $table = 'values_aboutus';
    protected $fillable = ['title' , 'value' , 'setting_id'];
    
    public function getSettings(){
        return $this->belongsTo('App\Setting' , 'setting_id');
    }
}
