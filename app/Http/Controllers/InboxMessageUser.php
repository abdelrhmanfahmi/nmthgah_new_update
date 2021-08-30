<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminUserMessage;
use App\User;
use DB;
// use Faker\Provider\File;
use App\File;
use App\MessageFile;
use App\Requesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;

class InboxMessageUser extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index($request_id){
        if(Requesto::where('user_id' , '=' , auth()->user()->id)->where('id' , '=' , $request_id)->first()){
            $inboxMessageUser = MessageFile::orderBy('id' , 'asc')
            ->where('admin_id' , '=' , 1)
            ->where('user_id' , '=' , auth()->user()->id)
            ->where('request_id' , '=' , $request_id)
            ->get();
            return view ('users_site.adminMessageUserDetails' , ['inboxMessageUser' => $inboxMessageUser]);
        }else{
            abort(404);
        }
    }
    
    public function storeMessage(Request $request){
        $inboxMessageUser = new MessageFile();
        $inboxMessageUser->message = $request->input('message');
        $inboxMessageUser->admin_id = 1;
        $inboxMessageUser->user_id = $request->input('user_id');
        $inboxMessageUser->request_id = $request->input('request_id');
        $inboxMessageUser->isAdmin = 0;
        $inboxMessageUser->save();
        
        return back();
    }
    public function storeFiles(Request $request){
        
        foreach($request->file('files') as $file)
        {
            $destinationPath = public_path(). '/uploads/';
            $filename = uniqid() . '.' .  $file->extension();
            $file->move($destinationPath, $filename);
            
            MessageFile::create([
                'files' => $filename,
                'admin_id' => 1,
                'user_id' => $request->input('user_id'),
                'request_id' => $request->input('request_id'),
                'isAdmin' => 0
            ]);
        }
            return 1;
        //   return back();
    }
    
    public function ShowImagesInMessages($id){
        $msgImage = MessageFile::find($id);
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
    
    public function downloadImagesInMessages($id){
        $msgImage = MessageFile::find($id);
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