<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFile extends Model
{
    protected $table = 'data_files';
    protected $fillable = [
        'files',
        'user_id',
        'request_id'
    ];
    public function RequestDataFiles(){
        return $this->belongsTo('App\User' , 'user_id');
    }
     public function FileDataRequests(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
}
