<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalCertificate extends Model
{
    protected $table = 'final_certificates';
    protected $fillable = [
        'pdf',
        'projectos_id',
        'request_id',
    ];
    public function filesForRequest(){
        return $this->belongsTo('App\Requesto' , 'request_id');
    }
    
    public function filesForProject(){
        return $this->belongsTo('App\Projecto' , 'projectos_id');
    }
}