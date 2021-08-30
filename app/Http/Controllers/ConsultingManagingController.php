<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\ConsulManage;
use App\TypeConsul;

class ConsultingManagingController extends Controller
{
    public function index(){
        $consulManag = ConsulManage::paginate(10);
        return view('admin.ConsulManage.index' , ['consulManag' => $consulManag]);
    }
    
    public function create(){
        return view('admin.ConsulManage.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'type' => 'required',
        ],
        [
            'name.required' => 'يرجي  كتابة الاسم',
            'email.required' => 'يرجي كتابة البريد الإلكتروني',
            'city.required' => 'يرجي كتابة المدينة',
            'type.required' => 'يرجي كتابة نوع خدمة الاستشارة الإدارية',
        ]);
        
        $consulManag = new ConsulManage();
        $consulManag->name = $request->input('name');
        $consulManag->email = $request->input('email');
        $consulManag->city = $request->input('city');
        $consulManag->type = $request->input('type');
        
        $consulManag->save();
        return redirect()->route('consulManag.index');
    }
    
    public function edit($id){
        $consulManag = ConsulManage::find($id);
        $typesOfConul = TypeConsul::all();
        return view('admin.ConsulManage.edit' , ['consulManag' => $consulManag , 'typesOfConul' => $typesOfConul]);
    }
    
    public function update(Request $request , $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'type' => 'required',
        ],
        [
            'name.required' => 'يرجي  كتابة الاسم',
            'email.required' => 'يرجي كتابة البريد الإلكتروني',
            'city.required' => 'يرجي كتابة المدينة',
            'type.required' => 'يرجي كتابة نوع خدمة الاستشارة الإدارية',
        ]);
        $consulManag = ConsulManage::find($id);
        $consulManag->name = $request->input('name');
        $consulManag->email = $request->input('email');
        $consulManag->city = $request->input('city');
        $consulManag->type = $request->input('type');
        
        $consulManag->save();
        return redirect()->route('consulManag.index');
    }
    
    public function delete($id){
        $consulManag = ConsulManage::find($id)->delete();
        return redirect()->route('consulManag.index');
    }
}