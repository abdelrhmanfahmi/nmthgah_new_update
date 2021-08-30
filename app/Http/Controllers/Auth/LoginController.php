<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest' , ['except' => ['logout' , 'userLogout']]);
    }
    
    public function login(Request $request){
        
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(auth()->guard('web')->attempt(['email' => $request->email , 'password' => $request->password] , $request->remember_token)){
            // return redirect()->intended(route('admin.dashboard'));
            return 1;
        }
        return 0;
        // return back()->with('msg' , 'the username or password is invalid');
        // return redirect()->back()->withInput($request->only('email' , 'remember'));
    }
    public function userLogout(){
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
