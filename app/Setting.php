<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'logo',
        'twitter',
        'instagram',
        'linkedin',
        'title',
        'breif',
        'image',
        'vision',
        'mission',
        'why',
        'admin_id',
    ];
    
    public function getValues(){
        return $this->hasMany('App\Values');
    }
}
