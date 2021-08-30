<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Consultant;

use App\Http\Requests\ConsultantRequest;
use App\Pillar;
use App\Project;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class ConsultantController extends Controller
{
    public function index()
    {
        $consultants = Consultant::all();
        return view ('admin.consultants.index' , ['consultants' => $consultants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::all();
        $pillars = Pillar::all();
        return view ('admin.consultants.create' , [
            'admins' => $admins ,
            'pillars' => $pillars
          ]);
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
            'first_name' => 'required|max:255',
             'last_name' => 'required|max:255',
             'email' => 'required|email',
             'password' => 'required|min:6',
             'phone' => 'required',
             'country' => 'required|max:255',
             'city' => 'required|max:255',
             'departement' => 'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $consultants = new Consultant();
            $consultants->first_name = $request->input('first_name');
            $consultants->last_name = $request->input('last_name');
            $consultants->email = $request->input('email');
            $consultants->password = Hash::make($request->input('password'));
            $consultants->phone = $request->input('phone');
            $consultants->country = $request->input('country');
            $consultants->city = $request->input('city');
            $consultants->departement = $request->input('departement');
            $consultants->admin_id = 1;

        }
        
        $consultants->save();
        return redirect()->route('consultants.index');
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
        $consultants = Consultant::find($id);
        $admins = Admin::all();
        $pillars = Pillar::all();
        return view ('admin.consultants.edit' , [
            'consultants' => $consultants ,
            'admins' => $admins,
            'pillars' => $pillars
             ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultantRequest $request, $id)
    {
        $validator = Validator::make($request->all(),  [
            'first_name' => 'required|max:255',
             'last_name' => 'required|max:255',
             'email' => 'required|email',
             'password' => 'required|min:6',
             'phone' => 'required',
             'country' => 'required|max:255',
             'city' => 'required|max:255',
             'departement' => 'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $consultants = Consultant::find($id);
            $consultants->first_name = $request->input('first_name');
            $consultants->last_name = $request->input('last_name');
            $consultants->email = $request->input('email');
            $consultants->password = Hash::make($request->input('password'));
            $consultants->phone = $request->input('phone');
            $consultants->country = $request->input('country');
            $consultants->city = $request->input('city');
            $consultants->departement = $request->input('departement');
            $consultants->admin_id = 1;
        }
        
        $consultants->save();
        return redirect()->route('consultants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultants = Consultant::find($id)->delete();
        return redirect()->route('consultants.index');
    }
}
