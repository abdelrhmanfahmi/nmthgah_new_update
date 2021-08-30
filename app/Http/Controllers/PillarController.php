<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pillar;

use Validator;

use App\Consultant;

use App\Http\Requests\PillarRequest;

class PillarController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth:admin');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pillars = Pillar::paginate(10);
        return view('admin.pillars.index' , ['pillars' => $pillars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pillars.create');
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
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        $pillars = new pillar();
        $pillars->name = $request->input('name');
        $pillars->save();
        }
        return redirect()->route('pillar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pillars = pillar::find($id);
        return view ('admin.pillars.edit' , ['pillars' => $pillars]);
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
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
        $pillars = Pillar::find($id);
        $pillars->name = $request->input('name');
        $pillars->save();
        }
        return redirect()->route('pillar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pillars = Pillar::find($id)->delete();
        return redirect()->route('pillar.index');
    }
}
