<?php

namespace App\Http\Controllers;

use App\Values;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
    public function index(){
        $values = Values::paginate(10);
        return view ('admin.values.index' , ['values' => $values]);
    }
    
    public function create(){
        return view ('admin.values.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'value' => 'required'
        ]);
        
        $values = new Values();
        $values->title = $request->input('title');
        $values->value = $request->input('value');
        $values->setting_id = 1;

        $values->save();
        return redirect()->route('values.index');
    }
    
     public function edit($id){
        $values = Values::find($id);
        return view ('admin.values.edit' , ['values' => $values]);
    }
    public function update(Request $request , $id){
        $request->validate([
            'title' => 'required',
            'value' => 'required'
        ]);
        
        $values = Values::find($id);
        $values->title = $request->input('title');
        $values->value = $request->input('value');
        $values->setting_id = 1;
        
        $values->save();
        return redirect()->route('values.index');
    }
    public function destroy($id){
        $values = Values::find($id)->delete();
        return redirect()->route('values.index');
    }
}