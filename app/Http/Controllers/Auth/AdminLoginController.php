<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin' , ['except' => ['logout']]);
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password] , $request->remember_token)){
            // return redirect()->intended(route('admin.dashboard'));
            return 1;
        }
        return 0;
        // return back()->with('msg' , 'the username or password is invalid');
        // return redirect()->back()->withInput($request->only('email' , 'remember'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

    