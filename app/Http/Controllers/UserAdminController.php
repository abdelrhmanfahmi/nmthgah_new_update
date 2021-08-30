<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminUserMessage;
use App\Course;
use App\File;
use App\Http\Requests\UserRequest;
use App\Indicator;
use App\Partner;
use App\Service;
use App\Setting;
use App\Team;
use App\User;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\JsonDecoder;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view ('admin.user.index' , ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::all();
        return view ('admin.user.create' , ['admins' => $admins]);
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'city' => 'required|max:255',
            'company' => 'required|max:255',
            'job_title' => 'required|max:255',
        ]);
        
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $users = new User();
            $users->first_name = $request->input('first_name');
            $users->last_name = $request->input('last_name');
            $users->email = $request->input('email');
            $users->password = Hash::make($request->input('password'));
            $users->phone = $request->input('phone');
            $users->city = $request->input('city');
            $users->company = $request->input('company');
            $users->job_title = $request->input('job_title');
            $users->admin_id = 1;
        }

        $users->save();
        return redirect()->route('users.index');
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
        $users = User::find($id);
        $admins = Admin::all();
        return view ('admin.user.edit' , ['users' => $users , 'admins' => $admins]);
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|',
            'password' => 'required|min:6',
            'phone' => 'required',
            'city' => 'required|max:255',
            'company' => 'required|max:255',
            'job_title' => 'required|max:255',
        ]);
        
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $users = User::find($id);
            $users->first_name = $request->input('first_name');
            $users->last_name = $request->input('last_name');
            $users->email = $request->input('email');
            $users->password = Hash::make($request->input('password'));
            $users->phone = $request->input('phone');
            $users->city = $request->input('city');
            $users->company = $request->input('company');
            $users->job_title = $request->input('job_title');
            $users->admin_id = 1;
        }

        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id)->delete();
        return redirect()->route('users.index');
    }
}