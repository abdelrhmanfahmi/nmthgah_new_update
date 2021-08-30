<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Requirement_Standard_PillarRequest;

use App\Requirement_Standard_Pillar;

use DB;

use App\Pillar;

use Validator;

use App\Standard_Pillar;

use App\FileRequirement;

class Requirement_Standard_PillarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pillars = Pillar::all();
        $standards = Standard_Pillar::all();
        $req_standard_pillars = Requirement_Standard_Pillar::paginate(10);
        return view ('admin.require_standard_pillars.index' , ['req_standard_pillars' => $req_standard_pillars , 'pillars' => $pillars , 'standards' => $standards]);
    }
    
    public function getRequirementStandardPillars(Request $r){
      $standardPillars = Requirement_Standard_Pillar::orderBy('id' , 'asc')->with('requirement_standard_pillar_Standard_Pillar')->where(function($q)use($r){
          if($r->has('s')){
            $col = 'id';
            $val = (int)$r->get('s');
            if($r->get('s_val') == 'name'){
              $col = 'user_id';
              $check = User::where('name', 'like', '%'.$r->get('s').'%')->first();
              $val = empty($check) ? 0 : $check->id;
            }
            $q->where($col, $val);
          }
        })->where(function($q)use($r){
          if($r->has('standard_pillar_id') && $r->get('standard_pillar_id') != ''){
            $q->where('standard_pillar_id', (int)$r->get('standard_pillar_id'));
          }
        })->paginate(20);
        foreach($standardPillars as $stand){
          $stand->Standard_name = Standard_Pillar::find($stand->standard_pillar_id)->standard_name;
        }
        return response()->json($standardPillars);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pillars = Pillar::all();
        return view ('admin.require_standard_pillars.create' , ['pillars' => $pillars]);
    }
    
    public function getStandardPillarsFromPillar($id){
        $getStandard = Pillar::with('pillarStandard_Pillar')->where('id' , '=' , $id)->get();
        $arr=[];
        foreach($getStandard as $stand){
            array_push($arr , $stand->pillarStandard_Pillar);
        }
        return response()->json($arr);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'name' => 'required',
            'explain' => 'required',
            'measure_cursor' => 'required',
            'indicator_estimation_method' => 'required',
            'models',
            'standard_pillar_id' => 'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $req_standard_pillars = new Requirement_Standard_Pillar();
            $req_standard_pillars->name = $request->input('name');
            $req_standard_pillars->explain = $request->input('explain');
            $req_standard_pillars->measure_cursor = $request->input('measure_cursor');
            $req_standard_pillars->indicator_estimation_method = $request->input('indicator_estimation_method');
            $req_standard_pillars->models = $request->input('models');
            $req_standard_pillars->standard_pillar_id = $request->input('standard_pillar_id');
            $req_standard_pillars->save();
        }
            return redirect()->route('req_stand_pillars.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $standard_pillars = Standard_Pillar::all();
        $req_standard_pillars = Requirement_Standard_Pillar::find($id);
        return view ('admin.require_standard_pillars.show' , [
            'standard_pillars' => $standard_pillars ,
            'req_standard_pillars' => $req_standard_pillars ,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $standard_pillars = Standard_Pillar::all();
        $req_standard_pillars = Requirement_Standard_Pillar::find($id);
        
        return view ('admin.require_standard_pillars.edit' , [
            'standard_pillars' => $standard_pillars ,
            'req_standard_pillars' => $req_standard_pillars ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),  [
            'name' => 'required',
            'explain' => 'required',
            'measure_cursor' => 'required',
            'indicator_estimation_method' => 'required',
            'models',
            'standard_pillar_id' => 'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $req_standard_pillars = Requirement_Standard_Pillar::find($id);
            $req_standard_pillars->name = $request->input('name');
            $req_standard_pillars->explain = $request->input('explain');
            $req_standard_pillars->measure_cursor = $request->input('measure_cursor');
            $req_standard_pillars->indicator_estimation_method = $request->input('indicator_estimation_method');
            $req_standard_pillars->models = $request->input('models');
            $req_standard_pillars->standard_pillar_id = $request->input('standard_pillar_id');
            $req_standard_pillars->save();
        }
            return redirect()->route('req_stand_pillars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $req_standard_pillars = Requirement_Standard_Pillar::find($id)->delete();
        return redirect()->route('req_stand_pillars.index');
    }
}
