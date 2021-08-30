<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminUserMessage;
use App\User;
use DB;
use App\File;
use App\Projecto;
use App\Consultant;
use App\MessageFileConsultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InboxMessageConsultant extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:consultant');
    // }
    
    public function indexConsultant($id1 , $id2 , $id3){
        if(Projecto::where('id' , '=' , $id2)->where('project_id' , '=' , $id3)->where('user_id' , '=' , $id1)->first()){
            $inboxMessageConsultant = MessageFileConsultant::orderBy('id' , 'asc')
            ->where('consultant_id' , '=' , auth()->guard('consultant')->user()->id)
            ->where('projectos_id' , '=' , $id2)
            ->where('project_manager_id' , '=' , $id3)
            ->get();
            
            return view ('users_site.adminMessagesConsultant' , ['inboxMessageConsultant' => $inboxMessageConsultant]);
        }else{
            abort(404);
        }
    }
    
    public function storeMessageConsultant(Request $request){
        $inboxMessageConsultant = new MessageFileConsultant();
        $inboxMessageConsultant->message = $request->input('message');
        $inboxMessageConsultant->pillar_id = Consultant::where('id' , '=' , Auth::guard('consultant')->user()->id)->value('departement');
        $inboxMessageConsultant->consultant_id = $request->input('consultant_id');
        $inboxMessageConsultant->projectos_id = $request->input('projectos_id');
        $inboxMessageConsultant->project_manager_id = $request->input('project_manager_id');
        $inboxMessageConsultant->isManager = 0;
        $inboxMessageConsultant->save();
        
        return back();
    }
    public function storeFilesConsultant(Request $request){
        foreach($request->file('files') as $file)
            {
                $destinationPath = public_path(). '/uploads/';
                $filename = uniqid() . '.' .  $file->extension();
                $file->move($destinationPath, $filename);
                
                MessageFileConsultant::create([
                    'files' => $filename,
                    'pillar_id' => Consultant::where('id' , '=' , Auth::guard('consultant')->user()->id)->value('departement'),
                    'consultant_id'=> $request->input('consultant_id'),
                    'projectos_id' => $request->input('projectos_id'),
                    'project_manager_id' => $request->input('project_manager_id'),
                    'isManager' => 0
                ]);
            }
           return 1;
    }
    
    public function ShowImagesInMessagesConsultant($id){
        $msgImage = MessageFileConsultant::find($id);
        $path = public_path('uploads/').$msgImage->files;
        $mimeType = mime_content_type($path);
    
        if($mimeType == 'image/png'){
            return response()->file($path);
        }elseif($mimeType == 'image/jpg'){
            return response()->file($path);
        }elseif($mimeType == 'image/jpeg'){
            return response()->file($path);
        }else{
            return response()->file($path);
        }
    }
    
    public function downloadImagesInMessagesConsultant($id){
        $msgImage = MessageFileConsultant::find($id);
        $path = public_path('uploads/').$msgImage->files;
        $mimeType = mime_content_type($path);
    
        if($mimeType == 'image/png'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpg'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpeg'){
            return response()->download($path);
        }else{
            return response()->download($path);
        }
    }
}