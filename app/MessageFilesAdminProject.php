<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageFilesAdminProject extends Model
{
    protected $table = 'messages_files_project_admins';
    protected $fillable = [
        'projectos_id',
        'request_id',
        'admin_id',
        'project_manager_id',
        'isAdmin',
        'message',
        'files'
    ];

    public function MessageToConsultantProjectManager(){
        return $this->belongsTo('App\Project' , 'project_manager_id');
    }
    public function MessageToAdminRequest(){
        return $this->belongsTo('App\Admin' , 'admin_id');
    }
}
