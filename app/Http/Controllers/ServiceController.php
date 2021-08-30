<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Service;
use Auth;
use Validator;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view ('admin.services.index' , ['services' => $services]);
    }

    public function create(){
        return view ('admin.services.create');
    }

    public function store(ServiceRequest $request){
        $services = new Service();
        $file = $request->file('image');
        $destinationPath = public_path(). '/uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $services->image = $filename;
        $services->title = $request->input('title');
        $services->desc = $request->input('desc');
        $services->admin_id = 1;

        $services->save();
        return redirect()->route('services.index');
    }

    public function edit($id){
        $services = Service::find($id);
        return view ('admin.services.edit' , ['services' => $services]);
    }

    public function update(Request $r , $id){
        // dd(Auth::guard('admin')->user()->id);
        $validator = Validator::make($r->all(), [
            'title' => 'required',
            'desc' => 'required'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $update = Service::find($id);
            if(empty($update))
                return redirect('admin/services');
            $update->title = $r->get('title');
            $update->desc = $r->get('desc');
            $update->admin_id = 1;
            
            if($r->has('image'))
                $update->image = uploadNow('image', $r);
            $update->save();
        }
        return redirect()->route('services.index');
        // $services = Service::find($id);
        // // $file = $request->file('image');
        // // $destinationPath = public_path(). '/uploads/';
        // // $filename = $file->getClientOriginalName();
        // // $file->move($destinationPath, $filename);
        // // $services->image = $filename;
        // $services->title = $request->input('title');
        // $services->desc = $request->input('desc');
        // $services->admin_id = Auth::guard('admin')->user()->id;

        // $services->save();
        // return redirect()->route('services.index');
    }

    public function destroy($id){
        $services = Service::find($id)->delete();
        return redirect()->route('services.index');
    }
}
