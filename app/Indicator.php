<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = 'indicators';
    protected $fillable = [
        'title',
        'desc',
        'image',
        'url',
        'admin_id'
    ];

    public function indicatorAdmin(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }
}
