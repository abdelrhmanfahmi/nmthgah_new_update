<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminUserMessage;
use App\User;
use DB;
// use Faker\Provider\File;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        // return response()->json('Under Development');
        $inboxMsgs = AdminUserMessage::all();
        return view ('admin.inbox.index' , ['inboxMsgs' => $inboxMsgs]);
    }
    
    public function create(){
        // return response()->json('Under Development');

        $admins = Admin::all();
        $users = User::all();
        return view ('admin.inbox.create' , ['admins' => $admins , 'users' => $users]);
    }

    public function store(Request $request){
        // return response()->json('Under Development');
        DB::transaction(function () use ($request) {

        $inboxMsgs = new AdminUserMessage();
        $inboxMsgs->message = $request->input('message');
        $inboxMsgs->admin_id = 1;
        $inboxMsgs->user_id = $request->input('user_id');
        $inboxMsgs->save();
        
        foreach($request->file('files') as $file)
            {
                $destinationPath = public_path(). '/uploads/';
                $filename = $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                
                File::create([
                    'files' => $filename,
                    'user_id'=> $inboxMsgs->user_id,
                    'message_id'=>$inboxMsgs->id
                ]);
            }

        });
        return redirect()->route('inbox.index');
    }

    public function show($message_id , $user_id){
        // return response()->json('Under Development');
        
        $inboxMsg = DB::table('files')
        ->join('admin_user_messages' , 'admin_user_messages.id' , 'files.message_id')
        ->join('users' , 'users.id' , 'files.user_id')
        ->select('files.message_id as number_id' , 'admin_user_messages.*' ,  'users.*' , 'files.files')
        ->where('files.message_id' , '=' , $message_id)
        ->where('files.user_id' , '=' , $user_id)
        ->get();
        
        return view ('admin.inbox.show' , ['inboxMsg' => $inboxMsg]);
    }
    
    public function edit($id){
        $inboxMsgs = AdminUserMessage::find($id);
        $admins = Admin::all();
        $users = User::all();
        return view ('admin.inbox.edit' , [
            'admins' => $admins 
             ,'users' => $users 
            , 'inboxMsgs' => $inboxMsgs
            ]);
    }

    public function update(Request $request , $id){
        // return response()->json('Under Development');
        
        DB::transaction(function () use ($request , $id) {

        $inboxMsgs = AdminUserMessage::find($id);
        $inboxMsgs->message = $request->input('message');
        $inboxMsgs->admin_id = 1;
        $inboxMsgs->user_id = $request->input('user_id');
        $inboxMsgs->save();
        
        foreach($request->file('files') as $file)
            {
                $destinationPath = public_path(). '/uploads/';
                $filename = $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                
                File::where('message_id' , $id)
                ->update([
                        'files'=>$filename,
                        'user_id'=>$inboxMsgs->user_id,
                    ]);
            }

        });
        return redirect()->route('inbox.index');
    }

    public function destroy($id){
        $inboxMsgs = AdminUserMessage::find($id)->delete();
        return redirect()->route('inbox.index');
    }
    public function downloadImagesForAdmin($id){
        $msgImage = AdminUserMessage::find($id);
        $path = public_path('storage/').$msgImage->files;
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

    public function ShowImagesForAdmin($id){
        $msgImage = AdminUserMessage::find($id);
        $path = public_path('storage/').$msgImage->files;
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
}
