<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:6'],
        //     'phone' => ['required' , 'min:9'],
        //     'city' => ['required' , 'string'],
        //     'company' => ['required' , 'string'],
        //     'job_title' => ['required' , 'string'],
        //     'admin_id' => ['required' , 'integer']
        // ]);
        
        $rules = array(
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
    		'email'=>'required|string|email|max:255|unique:users',
    		'password'=>'required|string|min:6',
    		'phone' => 'required|max:9',
    		'city' => 'required|string',
    		'company' => 'required|string',
    		'job_title' => 'required|string',
    		'admin_id' => 'required|integer'
    	);
        
        $messsages = array(
            'first_name.required' => 'من فضلك أدخل الاسم الاول',
            'last_name.required' => 'من فضلك أدخل الاسم الثاني',
    		'email.required'=>'من فضلك ادخل البريد الإلكتروني',
    		'password.required'=>'من فضلك ادخل الرقم السري',
            'phone.required'=>'من فضلك ادخل رقم الجوال',
            'city.required'=>'من فضلك ادخل المدينة',
            'company.required'=> 'من فضلك ادخل اسم الشركة',
            'job_title.required'=>'من فضلك ادخل المسمي الوظيفي',
            'email.unique'=> 'هذا البريد الإلكتروني موجود مسبقا',
            'password.min'=>'الرقم السري يجب أن يكون علي الاقل 6 رموز',
            'phone.max'=>'رقم الجوال يجب ان يكون مكون من 9 أرقام',
    	);
    	
	    $validator = Validator::make($data, $rules,$messsages);
	    return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => '+966' . $data['phone'],
            'city' => $data['city'],
            'company' => $data['company'],
            'job_title' => $data['job_title'],
            'admin_id' => 1,
        ]);
    }
}
