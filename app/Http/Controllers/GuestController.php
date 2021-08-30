<?php

namespace App\Http\Controllers;

use App\Course;
use App\Guest;
use App\GuestCourse;
use App\Http\Requests\GuestRequest;
use App\Http\Requests\PaidRequest;
use App\Mail\NewMail;
use App\Setting;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function storeCourseForGuest(Request $request)
    {

        DB::transaction(function () use ($request) {
            
             $request->validate([
                'name' => 'required|max:250',
                'email' => 'required|email',
                'phone' => 'required',
                'scientific_degree' => 'required'
            ],
            [
                'name.required' => 'يرجي  كتابة الاسم',
                'email.required' => 'يرجي كتابة الايميل',
                'phone.required' => 'يرجي كتابة الجوال',
                'scientific_degree.required' => 'يرجي كتابة الدرجة العلمية',
            ]);
            
            if (GuestCourse::where('email', '=', $request->input('email'))->where('course_id' , '=' , $request->input('course_id'))->exists()) {
                return back()->with('alertMessage' , 'عذرا تم تسجيلك في هذه الدورة مسبقا يرجي مراجعة الايميل وشكرا');
             }else{
                $guest = new Guest();
                $guest->name = $request->input('name');
                $guest->phone = $request->input('phone');
                $guest->scientific_degree = $request->input('scientific_degree');
                $guest->save();

                $guestCourse = new GuestCourse();
                $guestCourse->isSubmit = 1;
                $guestCourse->isChecked = 0;
                $guestCourse->bankImage = null;
                $guestCourse->guest_id = $guest->id;
                $guestCourse->course_id = $request->input('course_id');
                $guestCourse->email = $request->input('email');
                $guestCourse->save();
                $gmailName = DB::table('guest_courses')
                ->join('guests', 'guests.id', 'guest_courses.guest_id')
                ->select('guests.*')
                ->where('guest_courses.guest_id', '=', $guest->id)
                ->latest()
                ->first();
                Session::put('name', $gmailName->name);

                $courses = DB::table('guest_courses')
                ->join('courses', 'courses.id', 'guest_courses.course_id')
                ->select('guest_courses.id', 'guest_courses.email' ,'courses.courseName', 'courses.instructor', 'courses.courseTime', 'courses.pillars', 'courses.price')
                ->where('guest_courses.course_id', '=', $guestCourse->course_id)
                ->latest('guest_courses.created_at')
                ->first();
                
                $data = array('Name' => $gmailName, 'Course' => $courses);
                Mail::to($courses->email)->send(new NewMail($data));
                Session::put('user-course-id' , $courses->id);
                Session::put('email' , $courses->email);
                return back()->with('Message', 'تم تسجيلك في الدورة بنجاح فضلا قم بتأكيد عملية الدفع عن طريق الإيميل المسجل');
             }
        });
        
        return back();
    }

    public function getSubmitPageForGuest()
    {
        $settings = Setting::all();
        return view('site.submitPage' , ['settings' => $settings]);
    }
    public function submitCourseForGuest(Request $request)
    {
        
        $request->validate([
            'bankImage' => 'required|mimes:jpg,jpeg,png',
            'account' => 'required|max:255'
        ],
        [
            'bankImage.required' => 'يرجي إدخال الصورة',
            'account.required' => 'يرجي كتابة اسم المحول منه',
        ]);
        
        $image = $request->file('bankImage');
        $destinationPath = public_path(). '/uploads/';
        $filename = $image->getClientOriginalName();
        $image->move($destinationPath, $filename);
        
        $accountName = $request->input('account');
        $id = $request->input('id');
        // return $image;
            
         
        $guestCourse = DB::table('guest_courses')
            ->where('id', $id)
            ->update([
                'bankImage' => $filename,
                'account'=> $accountName,
                'isSubmit' => 0,
                'isChecked' => 1
            ]);

        return redirect('/nmthgah');
    }
    public function saved()
    {
        $courseUsers = GuestCourse::with('guests')->where('isSubmit', '=', 1)
            ->where('isChecked', '=', 0)
            ->where('bankImage', '=', null)
            ->groupBy('guest_id')
            ->get();
        // return response()->json($courseUsers);
        return view('admin.courses.indexSavedCoursesUsers', ['courseUsers' => $courseUsers]);
    }
    public function paid()
    {
        $courseUsers = GuestCourse::with('guests')->where('isSubmit', '=', 0)
            ->where('bankImage', '!=', null)
            ->where('isChecked', '=', 1)
            ->groupBy('guest_id')
            ->get();
        // return response()->json($courseUsers);
        return view('admin.courses.indexPaidCoursesUsers', ['courseUsers' => $courseUsers]);
    }
    public function ShowImageOfPaidCourse($id){
        $msgImage = GuestCourse::find($id);
        $path = public_path() . "/uploads/" .$msgImage->bankImage;
         return response()->file($path);
        // $mimeType = mime_content_type($path);
    // dd($mimeType);
        // if($mimeType == 'image/png'){
        //     return response()->file($path);
        // }elseif($mimeType == 'image/jpg'){
        //     return response()->file($path);
        // }elseif($mimeType == 'image/jpeg'){
        //     return response()->file($path);
        // }else{
        //     return response()->file($path);
        // }
    }
}
