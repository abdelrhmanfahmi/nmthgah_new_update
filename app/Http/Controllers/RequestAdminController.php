<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\DataFile;
use App\Requesto;
use App\User;
use App\Project;
use App\Consultant;
use App\Pillar;
use App\RequestPillar;

class RequestAdminController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth:admin');
        }
        public function index(){
            $requests = Requesto::where('finishedRequest' , '=' , 0)->orderBy('id' , 'desc')->paginate(10);
            return view ('admin.requests.index' , ['requests' => $requests]);
        }
    
        public function create(){
            $users = User::all();
            
            return view ('admin.requests.create' , [
                'users' => $users,
                ]);
        }
    
        public function store(Request $request){
            
            DB::transaction(function () use ($request) {
    
                 $this->validate($request, [
                    'waqf_name' => 'required',
                    'waqf_ownerName' => 'required',
                    'waqf_charger' => 'required',
                    'city' => 'required',
                    'street' => 'required',
                    'phone' => 'required',
                    'desc' => 'required',
                    'files'=> 'required',
                    'files.*' => 'mimes:png,jpg,jpeg,pdf,docx,pptx,doc',
                ]);
    
    
                $requests = new Requesto();
                $requests->waqf_name = $request->input('waqf_name');
                $requests->waqf_ownerName = $request->input('waqf_ownerName');
                $requests->waqf_charger = $request->input('waqf_charger');
                $requests->city = $request->input('city');
                $requests->street = $request->input('street');
                $requests->phone = $request->input('phone');
                $requests->desc = $request->input('desc');
                $requests->user_id = $request->input('user_id');
                $requests->finishedProject = 0;
                $requests->finishedRequest = 0;
                $requests->statusRequest = 0;
                $requests->save();
           
                foreach($request->file('files') as $file)
                    {
                        $destinationPath = public_path(). '/uploads/';
                        $filename = uniqid() . '.' .  $file->extension();
                        $file->move($destinationPath, $filename);
                        
                        DataFile::create([
                            'files' => $filename,
                            'user_id'=> $requests->user_id,
                            'request_id'=> $requests->id,
                        ]);
                    }
        });
            return redirect()->route('requests.index');
        }
    
        public function show($id){
            $requests = Requesto::find($id);
            $userOfRequesto = Requesto::with('usersRequest')->where('id' , '=' , $id)->get();
            $filesData = DataFile::with('FileDataRequests')->where('request_id' , '=' , $id)->get();
            
            
            return view ('admin.requests.show' , [
                'requests' => $requests ,
                'data' => $filesData,
                'userOfRequesto' => $userOfRequesto
                ]);
        }
        public function edit($id){
            $users = User::all();
            $requests = Requesto::find($id);
            $dataFiles = DataFile::with('FileDataRequests')->where('request_id' , '=' , $id)->get();
            
            
            
            return view ('admin.requests.edit' , [
                'users' => $users,
                'requests' => $requests,
                'data' => $dataFiles
                ]);
        }
        
        public function createProjectFromRequest($id){
            $userFromRequest = Requesto::with('usersRequest')->where('id' , '=' , $id)->get();
            $projectManager = Project::all();
            $requestToProject = Requesto::where('id' , '=' , $id)->get();
            $pillarsFromProject = Pillar::all();
            return view ('admin.requests.createProjectRequest' , [
                'userFromRequest' => $userFromRequest,
                'projectManager' => $projectManager,
                'requestToProject' => $requestToProject,
                'pillarsFromProject' => $pillarsFromProject
                ]);
        }
        
        public function update(Request $request , $id){
            
            DB::transaction(function () use ($request , $id) {
                 $this->validate($request, [
                    'waqf_name' => 'required',
                    'waqf_ownerName' => 'required',
                    'waqf_charger' => 'required',
                    'city' => 'required',
                    'street' => 'required',
                    'phone' => 'required',
                    'desc' => 'required',
                    'files.*' => 'mimes:png,jpg,jpeg,pdf,docx,pptx,doc',
                ]);
    
                $requests = Requesto::find($id);
                $requests->waqf_name = $request->input('waqf_name');
                $requests->waqf_ownerName = $request->input('waqf_ownerName');
                $requests->waqf_charger = $request->input('waqf_charger');
                $requests->city = $request->input('city');
                $requests->street = $request->input('street');
                $requests->phone = $request->input('phone');
                $requests->desc = $request->input('desc');
                $requests->user_id = $request->input('user_id');
                $requests->finishedProject = 0;
                $requests->finishedRequest = 0;
                $requests->statusRequest = $request->input('statusRequest');
                $requests->save();
                
                if($request->has('files')){
                    // DataFile::where('request_id' ,'=' , $id)->delete();
                    
                    foreach( (array) $request->file('files') as $file)
                        {
                            $destinationPath = public_path(). '/uploads/';
                            $filename = $file->getClientOriginalName();
                            $file->move($destinationPath, $filename);
                            
                                DataFile::create([
                                'files' => $filename,
                                'user_id'=> $requests->user_id,
                                'request_id'=> $requests->id,
                            ]);
                        }
                }
        });
            // return redirect()->route('requests.index');
            return back();
        }
        
        public function destroy($id){
            $requests = Requesto::find($id)->delete();
            return redirect()->route('requests.index');
        }
        
        public function deleteDataFileImage($id){
            $file = DataFile::find($id)->delete();
            return back();
        }
        
        public function downloadFilesFromAdminPanlRequests($id){
            $file = DataFile::find($id);
            $path = public_path('/uploads/').$file->files;
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
