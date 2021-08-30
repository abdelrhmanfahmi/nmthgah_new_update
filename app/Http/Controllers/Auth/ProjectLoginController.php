<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Auth;

use App\Http\Controllers\Controller;

class ProjectLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:manager' , ['except' => ['logout']]);
    }

    public function showProjectLoginForm(){
        return view ('project_site.login');
    }

    public function login(Request $request){
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(auth()->guard('manager')->attempt(['email' => $request->email , 'password' => $request->password] , $request->remember)){
            // return redirect('/project');
            return 1;
        }
        return 0;
        // return redirect()->back()->withInput($request->only('email' , 'remember'));
    }
    public function logout(){
        Auth::guard('manager')->logout();
        return redirect()->route('project.login');
    }
}
