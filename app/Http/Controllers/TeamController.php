<?php

namespace App\Http\Controllers;

use App\Team;
use Validator;
use Auth;
use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view ('admin.teams.index' , ['teams' => $teams]);
    }
    public function create(){
        return view ('admin.teams.create');
    }
    public function store(TeamRequest $request){
        $teams = new Team();
        $file = $request->file('image');
        $destinationPath = public_path(). '/uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $teams->image = $filename;
        $teams->name = $request->input('name');
        $teams->title = $request->input('title');
        $teams->desc = $request->input('desc');
        $teams->twitter = $request->input('twitter');
        $teams->email = $request->input('email');
        $teams->admin_id = 1;

        $teams->save();
        return redirect()->route('teams.index');
    }
    public function edit($id){
        $teams = Team::find($id);
        return view ('admin.teams.edit' , ['teams' => $teams]);
    }
    public function update(Request $r , $id){
        
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'twitter' => 'required',
            'email' => 'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $update = Team::find($id);
            if(empty($update))
                return redirect('admin/teams');
            $update->name = $r->get('name');
            $update->title = $r->get('title');
            $update->desc = $r->get('desc');
            $update->twitter = $r->get('twitter');
            $update->email = $r->get('email');
            $update->admin_id = 1;
            
            if($r->has('image'))
                $update->image = uploadNow('image', $r);
            $update->save();
        }
        return redirect()->route('teams.index');
        
        // $teams = Team::find($id);
        // // $file = $request->file('image');
        // // $destinationPath = public_path(). '/uploads/';
        // // $filename = $file->getClientOriginalName();
        // // $file->move($destinationPath, $filename);
        // // $teams->image = $filename;
        // $teams->name = $request->input('name');
        // $teams->title = $request->input('title');
        // $teams->desc = $request->input('desc');
        // $teams->twitter = $request->input('twitter');
        // $teams->email = $request->input('email');
        // $teams->admin_id = Auth::guard('admin')->user()->id;
        // $teams->save();
        // return redirect()->route('teams.index');
    }
    public function destroy($id){
        $teams = Team::find($id)->delete();
        return redirect()->route('teams.index');
    }
}
