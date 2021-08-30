<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminUserMessage;
use App\Course;
use App\File;
use App\Http\Requests\UserRequest;
use App\Indicator;
use App\Partner;
use App\Service;
use App\Setting;
use App\Question;
use App\Pillar;
use App\Team;
use App\User;
use App\ResultService;
use DB;
use App\Establish;
use App\TypeConsul;
use App\ConsulManage;
use App\Values;
use App\Agent;
use Validator;
use Session;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\JsonDecoder;

class UserController extends Controller
{
    // public function getFormPage(){
    //     $admins = Admin::all();
    //     return view ('users_site.userHome' , ['admins' => $admins]);
    // }

    

    public function homePageView(){
        $settings = Setting::all();
        $services = Service::all();
        $partners = Partner::all();
        $team = Team::all();
        $indicators = Indicator::all();
        $courses = Course::all();
        $values = Values::all();
        $agents = Agent::all();
        return view ('site.home' , [
            'settings' => $settings,
            'services' => $services,
            'partners' => $partners,
            'team' => $team,
            'indicators'=> $indicators,
            'courses' => $courses,
            'values' => $values,
            'agents' => $agents
        ]);
    }

    public function showCourses($id){
        $courseDetail = Course::find($id);
        $settings = Setting::all();
        $courses = Course::all();
        // return response()->json($courseDetail);
        return view ('site.details' , [
            'courseDetail' => $courseDetail ,
             'settings' => $settings,
             'courses' => $courses
             ]);
    }


    public function sendMessageFromUserToAdmin(Request $request){

        DB::transaction(function () use ($request) {
            $msg = new AdminUserMessage();
            $msg->message = $request->input('message');
            $msg->admin_id = 1;
            $msg->user_id = auth()->user()->id;
            $msg->save();

            foreach($request->file('files') as $file)
            {
                $filename = $file->store('files' , 'public');
                File::create([
                    'files' => $filename,
                    'user_id'=> $msg->user_id,
                ]);
            }
        });
        return redirect('/home');
        // $msg = new AdminUserMessage();
        // $msg->message = $request->input('message');
        // // $msg->files = $request->file('files')->store('files' , 'public');
    
        //     // foreach($request->files as $file)
        //     // {
        //     //     // $data[] = $file->store('files' , 'public');
        //     //     $filename = $file->store('files');
        //     //     $msg->files = $filename;
        //     // }
        //     // return $data;
        //     // $msg->files = json_encode($data);
            
        //     $msg->admin_id = $request->input('admin_id');
        //     $msg->user_id = $request->input('user_id');
        
        // $msg->save();
        
        
    }

    public function downloadImages($id){
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

    public function ShowImages($id){
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
    // public function messagesUserAdmin(){
    //     $msgUser = DB::table('admins')
    //     ->join('admin_user_messages' , 'admin_user_messages.admin_id' , 'admins.id')
    //     ->select('admin_user_messages.message' , 'admins.name')
    //     ->where('admin_user_messages.user_id' , '=' , auth()->user()->id)
    //     ->get();
    //     return view('users_site.userHome' , ['msgUser' => $msgUser]);
    // }
    
    public function getViewOfPillarsAndQuestions(){
        $pillars = Pillar::all();
        return view('site.evaluateService' , ['pillars' => $pillars]);
    }
    
    public function getQuestionsFromPillar(){
        $data = Pillar::with('GetQuestionsForPillars')->get();
        
        // $pillars = Pillar::all();
        // $dataAll = [];
        
        // foreach($pillars as $pillar){
        //     array_push($dataAll , Question::where('pillar_id' , '=' , $pillar->id)->get());
        // }
        
        $html = View::make('site.secondTry', ['data' => $data])->render();
        return response()->json($html);
    }
    
    public function showResultsAndCertificate($id){
        $id = Session::get('info_user_id');
        
        $dataResults = ResultService::with('getQuestions')->where('info_user_id' , '=' , $id)->get();
        
        return view('site.resultUserService' , ['dataResults' => $dataResults]);
    }
    
    public function getViewOfEstablishment(){
        return view('site.establishView');
    }
    
    public function SaveDataOfEstablishment(Request $request){
        $insertEstablish = new Establish();
        $insertEstablish->name = $request->input('name');
        $insertEstablish->email = $request->input('email');
        $insertEstablish->waqf = $request->input('waqf');
        $insertEstablish->city = $request->input('city');
        $insertEstablish->description = $request->input('description');
        
        $insertEstablish->save();
        return 1;
    }
    
    public function getViewOfConsulManager(){
        $conuslTypes = TypeConsul::all();
        return view ('site.consultingManage' , ['conuslTypes' => $conuslTypes]);
    }
    
    public function SaveDataForConultingManaging(Request $request){
        $insertConsul = new ConsulManage();
        $insertConsul->name = $request->input('name');
        $insertConsul->email = $request->input('email');
        $insertConsul->city = $request->input('city');
        $insertConsul->type = $request->input('type');
        
        $insertConsul->save();
        return 1;
    }
    
}
