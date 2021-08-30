<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Mail\ServiceMail;
use Illuminate\Support\Facades\Mail;
use App\Question;
use App\ResultService;
use App\InfoUserEvaluation;

class ResultServiceController extends Controller
{
    public function index(){
        $results = InfoUserEvaluation::paginate(10);
        return view('admin.evaluateService.indexResults' , ['results' => $results]);
    }
    
    public function show($id){
        $dataOfUser = InfoUserEvaluation::find($id);
        $results = ResultService::with('getUserOfResults')->with('getQuestions')->where('info_user_id' , '=' , $id)->get();
        // dd($results);
        return view('admin.evaluateService.showResults' , ['results' => $results , 'dataOfUser' => $dataOfUser]);
    }
    
    public function store(Request $request){
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'waqf' => 'required',
                'city' => 'required',
                'ResultsService' => 'array',
                'ResultsService.*.question_id' => 'required',
                'ResultsService.*.result' => 'required',
            ],
            [
                'name.required' => 'يرجي  كتابة الاسم',
                'email.required' => 'يرجي كتابة البريد الإلكتروني',
                'waqf.required' => 'يرجي كتابة اسم الوقف',
                'city.required' => 'يرجي كتابة المدينة',
                'ResultsService.required' => 'يرجي إدخال علي الأفل تقييم واحد',
                'ResultsService.*.result.required' => 'يرجي إدخال علي الأفل تقييم واحد'
            ]);
            
                
            $userData = new InfoUserEvaluation();
            $userData->name = $request->input('name');
            $userData->email = $request->input('email');
            $userData->waqf = $request->input('waqf');
            $userData->city = $request->input('city');
            $userData->description = $request->input('description');
            
            $userData->save();
            
            Session::put('info_user_id' , $userData->id);
            Session::put('info_user_email' , $userData->email);
            
            foreach($request->input('ResultsService') as $res){
                ResultService::create([
                    'info_user_id' => $userData->id,
                    'result' => $res['result'],
                    'question_id' => $res['question_id']
                ]);
            }
        });
        
        $idOfUser = Session::get('info_user_id');
        $emailOfUser = Session::get('info_user_email');
        
        $dataResults = ResultService::with('getQuestions')->where('info_user_id' , '=' , $idOfUser)->get();
        
        Mail::to($emailOfUser)->send(new ServiceMail($dataResults));
        
        
        return redirect('/showResultsForUser/'.$idOfUser);
    }
}