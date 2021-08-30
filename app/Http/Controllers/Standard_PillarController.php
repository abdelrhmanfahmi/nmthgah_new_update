<?php

namespace App\Http\Controllers;

use App\Standard_Pillar;

use App\Http\Requests\Standard_PillarRequest;
use App\Pillar;
use Validator;
use Illuminate\Http\Request;

class Standard_PillarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public function __construct()
    //     {
    //         $this->middleware('auth:admin');
    //     }
    public function index()
    {
        $pillars = Pillar::all();
        $standard_pillars = Standard_Pillar::paginate(10);
        return view ('admin.standard_pillars.index' , ['standard_pillars' => $standard_pillars , 'pillars' => $pillars]);
    }
    
    public function getStandardPillars(Request $r){
      $standardPillars = Standard_Pillar::orderBy('id' , 'asc')->with('standard_pillar_Pillar')->where(function($q)use($r){
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
          if($r->has('pillar_id') && $r->get('pillar_id') != ''){
            $q->where('pillar_id', (int)$r->get('pillar_id'));
          }
        })->paginate(20);
        foreach($standardPillars as $stand){
          $stand->pillar_name = Pillar::find($stand->pillar_id)->name;
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
        return view ('admin.standard_pillars.create' , ['pillars' => $pillars]);
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
            'standard_name' => 'required',
            'pillar_id' => 'required'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        $standard_pillars = new Standard_Pillar();
        $standard_pillars->standard_name = $request->input('standard_name');
        $standard_pillars->pillar_id = $request->input('pillar_id');
        $standard_pillars->save();
        }
        return redirect()->route('stand_pillars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $standard_pillars = Standard_Pillar::find($id);
        $pillars = Pillar::all();
        return view ('admin.standard_pillars.edit' , ['standard_pillars' => $standard_pillars , 'pillars' => $pillars]);
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
            'standard_name' => 'required',
            'pillar_id' => 'required'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        $standard_pillars = Standard_Pillar::find($id);
        $standard_pillars->standard_name = $request->input('standard_name');
        $standard_pillars->pillar_id = $request->input('pillar_id');
        $standard_pillars->save();
        }
        return redirect()->route('stand_pillars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $standard_pillars = Standard_Pillar::find($id)->delete();
        return redirect()->route('stand_pillars.index');
    }
}
