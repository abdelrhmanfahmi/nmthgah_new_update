<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AdminRequest;

use App\Admin;
use App\AdminUserMessage;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.homes');
    }

    public function showRegisterForm(){
        return view('adminPanel.manager.create');
    }

    public function show(){
        $admins = Admin::all();
        return view('admin.admins.index' , ['admins' => $admins]);
    }

    public function create(){
        return view ('admin.admins.create');
    }

    public function store(AdminRequest $request){
        $admins = new Admin();
        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make($request->input('password'));
        $admins->phone = $request->input('phone');

        $admins->save();
        return redirect()->route('admin.show');
    }

    public function edit($id){
        $admins = Admin::find($id);
        return view ('admin.admins.edit' , ['admins' => $admins]);
    }

    public function update(AdminRequest $request , $id){
        $admins = Admin::find($id);
        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make($request->input('password'));
        $admins->phone = $request->input('phone');

        $admins->save();

        return redirect()->route('admin.show');
    }

    public function delete($id){
        $admins = Admin::find($id)->delete();
        return redirect()->route('admin.show');
    }
}
