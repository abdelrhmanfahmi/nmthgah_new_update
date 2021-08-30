<?php
// use DB;

use App\Admin;
use App\AdminUserMessage;
use App\Consultant;
use App\Project;
use App\Requesto;
use App\ProjectMaker;
use App\User;
use File;
use App\Course;

function countMessagesForUser(){
	$count = DB::table('admins')
        ->join('admin_user_messages' , 'admin_user_messages.admin_id' , 'admins.id')
        ->where('admin_user_messages.user_id' , '=' , auth()->user()->id)
		->count();
		return $count;
}

function countMessagesForAdmin(){
	$count = AdminUserMessage::count();
	return $count;
}

function countConsultants(){
	$count = Consultant::count();
	return $count;
}

function ConsultantsWithProjectMaker(){
    $countConsultants = ProjectMaker::with('project_maker_consultant')
        ->where('consultant_id' , '=' , auth()->user()->id)
        ->count();
        return $countConsultants;
}

function countRequests(){
	$count = Requesto::count();
	return $count;
}

function countProjects(){
	$count = Project::count();
	return $count;
}

function countUsers(){
	$count = User::count();
	return $count;
}
function countCourses(){
    $courses = Course::count();
    return $courses;
}
function countAdmins(){
	$adminsCount = DB::table('admins')
	->count();
	return $adminsCount;
}
function uploadNow($imgName, $r, $multi = false, $exts = [], $file_upload = '')
{  
// 	$namefile = uniqid();

	$file = ($multi) ? $r : $r->file($imgName);
	$ext = $file->getClientOriginalExtension();
	$filename = $file->getClientOriginalName();
	$exts = empty($exts) ? ['jpeg','jpg','png','bmp','rar'] : $exts;
    if(!in_array($ext, $exts)){
		return '';
    }
	$fullname = $filename;
	$file_upload = ($file_upload == '') ? 'uploads' : $file_upload;
	$file->move(public_path($file_upload),$fullname);
	return $fullname;
}

function getFileSize(){
    
}