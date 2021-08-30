<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Project;
use  App\Http\Requests\ProjectRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view ('admin.projects.index' , ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::all();
        return view ('admin.projects.create' , ['admins' => $admins]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $projects = new Project();
        $projects->first_name = $request->input('first_name');
        $projects->last_name = $request->input('last_name');
        $projects->email = $request->input('email');
        $projects->password = Hash::make($request->input('password'));
        $projects->phone = $request->input('phone');
        $projects->admin_id = 1;

        $projects->save();
        return redirect()->route('projects.index');
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
        $projects = Project::find($id);
        $admins = Admin::all();
        return view ('admin.projects.edit' , ['projects' => $projects , 'admins' => $admins]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $projects = Project::find($id);
        $projects->first_name = $request->input('first_name');
        $projects->last_name = $request->input('last_name');
        $projects->email = $request->input('email');
        $projects->password = Hash::make($request->input('password'));
        $projects->phone = $request->input('phone');
        $projects->admin_id = 1;

        $projects->save();
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Project::find($id)->delete();
        return redirect()->route('projects.index');
    }
}
