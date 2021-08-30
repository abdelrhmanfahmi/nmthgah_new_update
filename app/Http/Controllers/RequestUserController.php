<?php

namespace App\Http\Controllers;

use App\DataFile;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests\RequestUserRequest;

use App\Projecto;
use App\ProjectoPillar;
use App\Consultant;
use App\Pillar;

use App\Requesto;
use App\FinalCertificate;

class RequestUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $requests = Requesto::where('user_id' , '=' , auth()->user()->id)->orderBy('id' , 'desc')->paginate(4);
        return view ('users_site.request' , ['requests' => $requests]);
    }

    public function create(){
        return view ('users_site.formRequest');
    }

    public function store(Request $request){
        // dd($request->all());
        DB::transaction(function () use ($request) {
    
            // $request->validate([
            //     'waqf_name' => 'required',
            //     'waqf_ownerName' => 'required',
            //     'waqf_charger' => 'required',
            //     'city' => 'required',
            //     'street' => 'required',
            //     'phone' => 'required',
            //     'desc' => 'required',
            //     'files'=> 'required',
            //     'files.*' => 'mimes:png,jpg,jpeg,pdf,docx,pptx,doc'
            // ],
            // [
            //     'waqf_name.required' => 'يرجي  كتابة اسم الوقف',
            //     'waqf_ownerName.required' => 'يرجي كتابة صاحب الوقف',
            //     'waqf_charger.required' => 'يرجي كتابة مسؤول الوقف',
            //     'city.required' => 'يرجي  كتابة المدينة',
            //     'street.required' => 'يرجي كتابة الشارع',
            //     'phone.required' => 'يرجي كتابة الجوال',
            //     'desc.required' => 'يرجي  كتابة وصف الوقف',
            //     'files.required' => 'يرجي إدخال صور الوقف',
            // ]);


            $requests = new Requesto();
            $requests->waqf_name = $request->input('waqf_name');
            $requests->waqf_ownerName = $request->input('waqf_ownerName');
            $requests->waqf_charger = $request->input('waqf_charger');
            $requests->city = $request->input('city');
            $requests->street = $request->input('street');
            $requests->phone = '+966' . $request->input('phone');
            $requests->desc = $request->input('desc');
            $requests->user_id = auth()->user()->id;
            $requests->finishedProject = 0;
            $requests->finishedRequest = 0;
            $requests->statusRequest = 0;
            $requests->save();
            
            if (is_array($request->file('files')) || is_object($request->file('files'))){
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
            }else{
                return 2;
            }
    });
        return 1;
    }
    public function show($id){
        // $showRequest = Requesto::find($id)
        // ->where('user_id' , '=' , auth()->user()->id)
        // ->get();
        if(Requesto::where('id' , '=' , $id)->where('user_id' , '=' , auth()->user()->id)->first()){
            $showRequest = DB::table('requests')
            ->select('*')
            ->where('id' , '=' , $id)
            ->where('user_id' , '=' , auth()->user()->id)
            ->get();
            // dd($showRequest);
            return view ('users_site.detailsProjectUser' , ['showRequest'=>$showRequest]);
        }else{
            abort(404);
        }
    }
    
    public function getResultsForUsers($request_id , $projectos_id){
        $projectos_id = Session::get('project_user_idFinal');
        $showFullProject = Projecto::with('ProjectoRequests')->where('request_id' , '=' , $request_id)->get();
        $standardsPillarsUsed = Pillar::with(['ProjectResultsWithItsPillar' => function($q) use($request_id , $projectos_id){
            $q->where('request_id' , '=' , $request_id);
            $q->where('projectos_id' , '=' , $projectos_id);
        }])->whereHas('ProjectResultsWithItsPillar' , function($q2) use($request_id , $projectos_id){
            $q2->where('request_id' , '=' , $request_id);
            $q2->where('projectos_id' , '=' , $projectos_id);
        })->get();
        
        $html = View::make('firstTry', ['showFullProject' => $showFullProject , 'standardsPillarsUsed' => $standardsPillarsUsed])->render();
        return response()->json($html);
    }
    
    public function showMessageForm($id){
        $messagesUserAdmin = Requesto::with('usersRequest')
        ->where('user_id' , '=' , $id)
        ->get();
        return view ('users_site.adminMessageUserDetails' , ['messagesUserAdmin' => $messagesUserAdmin]);
    }
    
    public function progressStatusOfRequest($request_id){
        if(Requesto::where('id' , '=' , $request_id)->where('statusRequest' , '=' , 0)->first()){
            return 0;
        }else if(Requesto::where('id' , '=' , $request_id)->where('statusRequest' , '=' , 1)->first()){
            return 1;
        }else if(Requesto::where('id' , '=' , $request_id)->where('statusRequest' , '=' , 2)->first()){
            return 2;
        }else if(Requesto::where('id' , '=' , $request_id)->where('statusRequest' , '=' , 3)->first()){
            return 3;
        }else{
            if(Projecto::where('request_id' , '=' , $request_id)->first()){
                $projectID = Projecto::where('request_id' , '=' , $request_id)->first();
                Session::put('project_user_idFinal' , $projectID->id);
                return $projectID->id;
            }else{
                return "not_found";
            }
            
        }
    }
    
    public function downloadResultsProject($request_id){
        $file = FinalCertificate::find($request_id);
        $path = public_path('/uploads/').$file->pdf;
        $mimeType = mime_content_type($path);
        
        return response()->download($path);
    }
}
