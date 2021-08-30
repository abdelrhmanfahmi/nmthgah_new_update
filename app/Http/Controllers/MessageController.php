<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageFile;

use App\Http\Requests\MessageRequest;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\MessageFilesAdminProject;
use App\Http\Requests\ContactRequest;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::orderBy("id" , 'DESC')->paginate(10);
        return view ('admin.messages.index' , ['messages' => $messages]);
    }
    public function store(MessageRequest $request){
        $messages = new Message();
        $messages->name = $request->input('name');
        $messages->email = $request->input('email');
        $messages->phone = $request->input('phone');
        $messages->service = $request->input('service');
        $messages->affiliate = $request->input('affiliate');
        $messages->message = $request->input('message');
        
        $messages->save();
        return redirect('/nmthgah')->with('message' , 'Your Service ordered Successful');
    }
    public function show($id){
        $message = Message::find($id);
        return view ('admin.messages.show' , ['message' => $message]);
    }
    public function edit($id){
        $messages = Message::find($id);
        return view ('admin.messages.edit' , ['messages' => $messages]);
    }
    public function update(MessageRequest $request , $id){
        $messages = Message::find($id);
        $messages->name = $request->input('name');
        $messages->email = $request->input('email');
        $messages->phone = $request->input('phone');
        $messages->service = $request->input('service');
        $messages->affiliate = $request->input('affiliate');
        $messages->message = $request->input('message');
        
        $messages->save();
        return redirect()->route('messages.index');
    }
    public function destroy($id){
        $messages = Message::find($id)->delete();
        return redirect()->route('messages.index');
    }
    
    public function getMessagesForAdmin($id1 , $id2){
        $getMessage = MessageFile::with('messagesToAdmin')
        ->where('admin_id' , '=' , 1)
        ->where('user_id' , '=' , $id1)
        ->where('request_id' , '=' , $id2)
        ->get();
        return view('admin.requests.indexUserToAdmin' , ['getMessage' => $getMessage]);
    }
    
    public function storeMessageForAdmin(Request $request){
        $inboxMessageUser = new MessageFile();
        $inboxMessageUser->message = $request->input('message');
        $inboxMessageUser->user_id = $request->input('user_id');
        $inboxMessageUser->admin_id = 1;
        $inboxMessageUser->request_id = $request->input('request_id');
        $inboxMessageUser->isAdmin = 1;
        $inboxMessageUser->save();
        
        return back();
    }
    public function storeMessageForAdminFiles(Request $request){
        
        foreach($request->file('files') as $file)
        {
            $destinationPath = public_path(). '/uploads/';
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            
            MessageFile::create([
                'files' => $filename,
                'admin_id' => 1,
                'user_id' => $request->input('user_id'),
                'request_id' => $request->input('request_id'),
                'isAdmin' => 1
            ]);
        }
           return 1;
    }
    
    public function indexAdminProjectMessages($id1 , $id2 , $id3){
        $messageAdminProject = MessageFilesAdminProject::with('MessageToAdminRequest')
        ->where('project_manager_id' , '=' , $id3)
        ->where('admin_id' , '=' , 1)
        ->where('projectos_id' , '=' , $id1)
        ->where('request_id' , '=' , $id2)
        ->get();
        return view('admin.projectos.indexMessageProjectAdmin' , ['messageAdminProject' => $messageAdminProject]);
    }
    
    public function storeMessageProjectToAdmin2(Request $request){
        
        $inboxMessageProjectToConsultant = new MessageFilesAdminProject();
        $inboxMessageProjectToConsultant->projectos_id = $request->input('projectos_id');
        $inboxMessageProjectToConsultant->request_id = $request->input('request_id');
        $inboxMessageProjectToConsultant->admin_id = 1;
        $inboxMessageProjectToConsultant->project_manager_id = $request->input('project_manager_id');
        $inboxMessageProjectToConsultant->isAdmin = 1;
        $inboxMessageProjectToConsultant->message = $request->input('message');
        
        
        $inboxMessageProjectToConsultant->save();
        
        return back();
    }
    
    public function storeFilesProjectToAdmin2(Request $request){
    
        foreach($request->file('files') as $file)
            {
                $destinationPath = public_path(). '/uploads/';
                $filename = $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                
                MessageFilesAdminProject::create([
                    'files' => $filename,
                    'request_id'=> $request->input('request_id'),
                    'admin_id'=> 1,
                    'project_manager_id'=> $request->input('project_manager_id'),
                    'isAdmin' => 1,
                    'projectos_id' => $request->input('projectos_id')
                ]);
            }
           return 1;
    }
    
}
