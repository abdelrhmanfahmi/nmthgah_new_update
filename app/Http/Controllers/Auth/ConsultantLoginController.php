<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Auth;

use App\Http\Controllers\Controller;

class ConsultantLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:consultant' , ['except' => ['logout']]);
    }

    public function showConsultantLoginForm(){
        return view ('consultant_site.login');
    }
    public function login(Request $request){
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('consultant')->attempt(['email' => $request->email , 'password' => $request->password] , $request->remember)){
            // return redirect('/consultant');
            return 1;
        }
        return 0;
        // return redirect()->back()->withInput($request->only('email' , 'remember'));
    }
    public function logout(){
        Auth::guard('consultant')->logout();
        return redirect('/login');
    }
}
