<?php

namespace App\Http\Controllers;

use App\Pillar;
use App\Question;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class QuestionEvaluation extends Controller
{
    public function index()
    {
        $questions = Question::paginate(10);
        return view('admin.evaluateService.index' , ['questions' => $questions]);
    }

   
    public function create()
    {
        $pillars = Pillar::all();
        return view ('admin.evaluateService.create' , [
            'pillars' => $pillars
          ]);
    }

   
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'questionType'=>'required'
        ],
        [
            'questionType.required'=>'من فضلك أدخل الأسئلة'
        ]);
        
        foreach($request->input('questionType') as $ques){
             Question::create([
                 'question' => $ques['question'],
                'pillar_id' => $ques['pillar_id']
            ]);
         }
        return redirect()->route('evaluate.index');
    }
    
    public function edit($id){
        $pillars = Pillar::all();
        $questions = Question::find($id);
        return view('admin.evaluateService.edit' , ['questions' => $questions , 'pillars' => $pillars]);
    }
    
    public function update(Request $request , $id){
        $request->validate([
            'question'=>'required',
            'pillar_id'=>'required'
        ],
        [
            'question.required'=>'من فضلك أدخل السؤال',
            'pillar_id.required' => 'من فضلك أدخل الركن',
        ]);
        
        $question = Question::find($id);
        $question->question = $request->input('question');
        $question->pillar_id = $request->input('pillar_id');
        
        $question->save();
        return redirect()->route('evaluate.index');
    }
    
    public function destroy($id)
    {
        $consultants = Question::find($id)->delete();
        return redirect()->route('evaluate.index');
    }
}
