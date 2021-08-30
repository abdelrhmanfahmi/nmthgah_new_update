<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(){
        $agents = Agent::paginate(10);
        return view ('admin.agents.index' , ['agents' => $agents]);
    }
    
    public function create(){
        return view ('admin.agents.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg'
        ]);
        
        $agents = new Agent();
        $file = $request->file('logo');
        $destinationPath = public_path(). '/uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $agents->logo = $filename;

        $agents->save();
        return redirect()->route('agents.index');
    }
    
    public function edit($id){
        $agents = Agent::find($id);
        return view ('admin.agents.edit' , ['agents' => $agents]);
    }
    
    public function update(Request $request , $id){
        $request->validate([
            'logo' => 'mimes:png,jpg,jpeg'
        ]);
        
        $agents = Agent::find($id);
        if($request->has('logo')){
            $file = $request->file('logo');
            $destinationPath = public_path(). '/uploads/';
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $agents->logo = $filename;
        }
        $agents->save();
        return redirect()->route('agents.index');
    }
    public function destroy($id){
        $agents = Agent::find($id)->delete();
        return redirect()->route('agents.index');
    }
}
