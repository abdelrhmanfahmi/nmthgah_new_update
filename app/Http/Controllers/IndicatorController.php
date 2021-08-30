<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\Http\Requests\IndicatorRequest;
use Auth;
use Validator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function index(){
        $indicators = Indicator::all();
        return view ('admin.indicators.index' , ['indicators' => $indicators]);
    }

    public function create(){
        return view ('admin.indicators.create');
    }

    public function store(IndicatorRequest $request){
        $indicators = new Indicator();
        $indicators->title = $request->input('title');
        $indicators->desc = $request->input('desc');
        $file = $request->file('image');
        $destinationPath = public_path(). '/uploads/';
        $filename = uniqid() . '.' .  $file->extension();
        $file->move($destinationPath, $filename);
        $indicators->image = $filename;
        $indicators->url = $request->input('url');
        $indicators->admin_id = 1;

        $indicators->save();
        return redirect()->route('indicator.index');
    }

    public function edit($id){
        $indicators = Indicator::find($id);
        return view ('admin.indicators.edit' , ['indicators' => $indicators]);
    }

    public function update(Request $r , $id){
        
        $validator = Validator::make($r->all(), [
            'title' => 'required',
            'desc' => 'required'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $update = Indicator::find($id);
            if(empty($update))
                return redirect('admin/indicator');
            $update->title = $r->get('title');
            $update->desc = $r->get('desc');
            $update->url = $r->get('url');
            $update->admin_id = 1;
            
            if($r->has('image'))
                $update->image = uploadNow('image', $r);
            $update->save();
        }
        return redirect()->route('indicator.index');
        // $indicators = Indicator::find($id);
        // $indicators->title = $request->input('title');
        // $indicators->desc = $request->input('desc');
        // $file = $request->file('image');
        // $destinationPath = public_path(). '/uploads/';
        // $filename = $file->getClientOriginalName();
        // $file->move($destinationPath, $filename);
        // $indicators->image = $filename;
        // $indicators->admin_id = Auth::guard('admin')->user()->id;

        // $indicators->save();
        // return redirect()->route('indicator.index');
    }

    public function destroy($id){
        $indicators = Indicator::find($id)->delete();
        return redirect()->route('indicator.index');
    }
}
