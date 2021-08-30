<?php

namespace App\Http\Controllers;

use App\Partner;
use Auth;
use Validator;
use App\Http\Requests\PartnerRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        $partners = Partner::all();
        return view ('admin.partners.index' , ['partners' => $partners]);
    }
    public function edit($id){
        $partners = Partner::find($id);
        return view ('admin.partners.edit' , ['partners' => $partners]);
    }
    public function create(){
        return view ('admin.partners.create');
    }
    public function store(PartnerRequest $request){
        $partners = new Partner();
        $partners->title = $request->input('title');
        $file = $request->file('image');
        $destinationPath = public_path(). '/uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $partners->image = $filename;
        $partners->admin_id = 1;

        $partners->save();
        return redirect()->route('partners.index');
    }
    public function update(Request $r , $id){
        
        $validator = Validator::make($r->all(), [
            'title' => 'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $update = Partner::find($id);
            if(empty($update))
                return redirect('admin/partners');
            $update->title = $r->get('title');
            $update->admin_id = 1;
            
            if($r->has('image'))
                $update->image = uploadNow('image', $r);
            $update->save();
        }
        return redirect()->route('partners.index');
        // $partners = Partner::find($id);
        // $partners->title = $request->input('title');
        // $file = $request->file('image');
        // $destinationPath = public_path(). '/uploads/';
        // $filename = $file->getClientOriginalName();
        // $file->move($destinationPath, $filename);
        // $partners->image = $filename;
        // $partners->admin_id = Auth::guard('admin')->user()->id;

        // $partners->save();
        // return redirect()->route('partners.index');
    }
    public function destroy($id){
        $partners = Partner::find($id)->delete();
        return redirect()->route('partners.index');
    }
}
