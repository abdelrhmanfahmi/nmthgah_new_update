<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Establish;

class EstablishController extends Controller
{
    public function index(){
        $establish = Establish::paginate(10);
        return view('admin.establishment.index' , ['establish' => $establish]);
    }
    
    public function create(){
        return view('admin.establishment.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'waqf' => 'required',
            'city' => 'required',
            'description' => 'required'
        ],
        [
            'name.required' => 'يرجي  كتابة الاسم',
            'email.required' => 'يرجي كتابة البريد الإلكتروني',
            'waqf.required' => 'يرجي كتابة اسم الوقف',
            'city.required' => 'يرجي كتابة المدينة',
            'description.required' => 'يرجي إدخال وصف التأسيس المعياري'
        ]);
        
        $establish = new Establish();
        $establish->name = $request->input('name');
        $establish->email = $request->input('email');
        $establish->waqf = $request->input('waqf');
        $establish->city = $request->input('city');
        $establish->description = $request->input('description');
        
        $establish->save();
        return redirect()->route('establish.index');
    }
    
    public function edit($id){
        $establish = Establish::find($id);
        return view('admin.establishment.edit' , ['establish' => $establish]);
    }
    
    public function update(Request $request , $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'waqf' => 'required',
            'city' => 'required',
            'description' => 'required'
        ],
        [
            'name.required' => 'يرجي  كتابة الاسم',
            'email.required' => 'يرجي كتابة البريد الإلكتروني',
            'waqf.required' => 'يرجي كتابة اسم الوقف',
            'city.required' => 'يرجي كتابة المدينة',
            'description.required' => 'يرجي إدخال وصف التأسيس المعياري'
        ]);
        $establish = Establish::find($id);
        $establish->name = $request->input('name');
        $establish->email = $request->input('email');
        $establish->waqf = $request->input('waqf');
        $establish->city = $request->input('city');
        $establish->description = $request->input('description');
        
        $establish->save();
        return redirect()->route('establish.index');
    }
    
    public function delete($id){
        $establish = Establish::find($id)->delete();
        return redirect()->route('establish.index');
    }
}