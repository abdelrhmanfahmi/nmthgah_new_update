<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TypeConsul;

class TypesConsultingManagingController extends Controller
{
    public function index(){
        $typesConsul = TypeConsul::paginate(10);
        return view('admin.typesConsulting.index' , ['typesConsul' => $typesConsul]);
    }
    
    public function create(){
        return view('admin.typesConsulting.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'TypeConsulting' => 'required',
        ],
        [
            'TypeConsulting.required' => 'يرجي  كتابة نوع خدمة الاستشارة',
        ]);
        
        foreach($request->input('TypeConsulting') as $type){
             TypeConsul::create([
                 'name' => $type['name']
            ]);
         }
        
        return redirect()->route('typesConsul.index');
    }
    
    public function edit($id){
        $typesConsul = TypeConsul::find($id);
        return view('admin.typesConsulting.edit' , ['typesConsul' => $typesConsul]);
    }
    
    public function update(Request $request , $id){
        $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'يرجي  كتابة نوع خدمة الاستشارة',
        ]);
        $typesConsul = TypeConsul::find($id);
        $typesConsul->name = $request->input('name');
        
        $typesConsul->save();
        return redirect()->route('typesConsul.index');
    }
    
    public function delete($id){
        $typesConsul = TypeConsul::find($id)->delete();
        return redirect()->route('typesConsul.index');
    }
}