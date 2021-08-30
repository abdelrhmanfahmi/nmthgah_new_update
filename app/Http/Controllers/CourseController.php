<?php

namespace App\Http\Controllers;

use App\Course;
use App\GuestCourse;
use App\UserCourse;
use App\Guest;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\PaidRequest;
use Auth;
use Carbon\Carbon;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view ('admin.courses.index' , ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.courses.create');
    }

    /**
     
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $courses = new Course();
        $courses->courseName = $request->input('courseName');
        $courses->instructor = $request->input('instructor');
        $courses->instructorDesc = $request->input('instructorDesc');
        $file = $request->file('instructorImage');
        $destinationPath = public_path(). '/uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $courses->instructorImage = $filename;
        $courses->pillars = $request->input('pillars');
        $courses->price = $request->input('price');
        $courses->courseTime = $request->input('courseTime');
        $courses->courseDate = $request->input('courseDate');
        $courses->timeCourse = $request->input('timeCourse');
        $courses->payment_method = $request->input('payment_method');
        $file2 = $request->file('image_bank');
        $destinationPath2 = public_path(). '/uploads/';
        $filename2 = $file2->getClientOriginalName();
        $file2->move($destinationPath2, $filename2);
        $courses->image_bank = $filename2;
        $courses->international_account = $request->input('international_account');
        $courses->local_account = $request->input('local_account');
        $courses->admin_id = 1;
        // dd($courses);

        $courses->save();
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $course = Course::find($id);
        return response()->json($course);
        // return view ('site.courseDetail' , ['courseDetail' => $courseDetail]);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::find($id);
        return view ('admin.courses.edit' , ['courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'courseName' => 'required',
            'instructor' => 'required',
            'instructorDesc' => 'required',
            'pillars' => 'required',
            'price' => 'required',
            'courseTime' => 'required',
            'courseDate' => 'required',
            'timeCourse' => 'required',
            'payment_method' => 'required',
            'international_account' => 'required',
            'local_account' => 'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $update = Course::find($id);
            if(empty($update))
                return redirect('admin/courses');
            $update->courseName = $r->get('courseName');
            $update->instructor = $r->get('instructor');
            $update->instructorDesc = $r->get('instructorDesc');
            $update->pillars = $r->get('pillars');
            $update->price = $r->get('price');
            $update->courseTime = $r->get('courseTime');
            $update->courseDate = $r->get('courseDate');
            $update->timeCourse = $r->get('timeCourse');
            $update->payment_method = $r->get('payment_method');
            $update->international_account = $r->get('international_account');
            $update->local_account = $r->get('local_account');
            if($r->has('instructorImage'))
                $update->instructorImage = uploadNow('instructorImage', $r);
            if($r->has('image_bank'))
                $update->image_bank = uploadNow('image_bank', $r);
            $update->admin_id = 1;    
            $update->save();
        }
        return redirect()->route('courses.index');
        // $courses = Course::find($id);
        // $courses->courseName = $request->input('courseName');
        // $courses->instructor = $request->input('instructor');
        // $courses->instructorDesc = $request->input('instructorDesc');
        // $file = $request->file('instructorImage');
        // $destinationPath = public_path(). '/uploads/';
        // $filename = $file->getClientOriginalName();
        // $file->move($destinationPath, $filename);
        // $courses->instructorImage = $filename;
        // $courses->pillars = $request->input('pillars');
        // $courses->price = $request->input('price');
        // $courses->courseTime = $request->input('courseTime');
        // $courses->courseDate = $request->input('courseDate');
        // $courses->timeCourse = $request->input('timeCourse');
        // $courses->payment_method = $request->input('payment_method');
        // $file2 = $request->file('image_bank');
        // $destinationPath2 = public_path(). '/uploads/';
        // $filename2 = $file2->getClientOriginalName();
        // $file2->move($destinationPath2, $filename2);
        // $courses->image_bank = $filename2;
        // // if($request->has('image_bank'))
        // //         $courses->image_bank = uploadNow('image_bank', $request);
        // $courses->international_account = $request->input('international_account');
        // $courses->local_account = $request->input('local_account');
        // $courses->admin_id = Auth::guard('admin')->user()->id;
        // $courses->save();
        // return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Course::find($id)->delete();
        return redirect()->route('courses.index');
    }

    public function storeCourseForUser(Request $request){
        $courseUser = new UserCourse();
        $courseUser->user_id = auth()->user()->id;
        $courseUser->course_id = $request->course_id;
        if($courseUser->bankImage == null){
            $courseUser->isSubmit = 1;
            $courseUser->isChecked = 0;
        }else{
            $courseUser->isChecked = 1;
            $courseUser->isSubmit = 0;
        }
        $courseUser->scientific_degree = $request->science;

        $courseUser->save();

        // $gmailName = DB::table('contact_us')->latest()->first()->name;
        $gmailName = DB::table('user_courses')
        ->join('users' , 'users.id' , 'user_courses.user_id')
        ->select('users.*')
        ->where('user_courses.user_id' , '=' , auth()->user()->id)
        ->latest()
        ->first();

        Session::put('name' , $gmailName->first_name);
        Session::put('email' , $gmailName->email);

        // return $gmailName;
        // $courses = DB::table('contact_us')->latest()->first()->content;
        // $courses = UserCourse::with('courses')
        // ->where('course_id' , '=' , $request->course_id)
        // ->latest()
        // ->first();
        $courses = DB::table('user_courses')
        ->join('courses' , 'courses.id' , 'user_courses.course_id')
        ->select('user_courses.id' , 'courses.courseName' , 'courses.instructor' , 'courses.instructorDesc' , 'courses.pillars' , 'courses.price' ,'courses.courseDate')
        ->where('user_courses.course_id' , '=' , $request->course_id)
        ->latest('user_courses.created_at')
        ->first();

        Session::put('user-course-id' , $courses->id);

        $data = array('Name' => $gmailName , 'Course' => $courses);
        Mail::send('emails.mail' , $data , function($message) use ($gmailName){
            $message->to($gmailName->email , 'cMark Company')
            ->subject('حسنا لقد قمت بالتسجيل في هذا الكورس بنجاح الان يمكنك التأكيد علي الكورس بالدفع من خلال paypal او credit-card');
            $message->from('abdo.fahmy9696@gmail.com' , 'Abdelrhman Fahmy');
        });
        return response()->json($courseUser);
    }

    public function getSubmitPage(){
        return view ('site.submitPage');
    }
    public function submitCourseForUser(PaidRequest $request){ 
        $image = $request->file('bankImage');
        // $image->move(public_path()."/storage/files", $image->getClientOriginalName());
        // return $image;
        $id = $request->input('id');
        // return $image;
        $userCourse = DB::table('user_courses')
        ->where('id', $id)
        ->update(['bankImage' => $image->store('files' , 'public'),
            'isSubmit'=> 0 ,
            'isChecked'=> 1
        ]);
        
        return redirect('/home')->with('message' , 'تهانينا لقد تم تأكيد الكورس لك');
    }
    public function saved(){
        $courseGuests = GuestCourse::with('guests')->with('courses')
        ->where('isSubmit' , '=' , 1)
        ->where('isChecked' , '=' , 0)
        ->where('bankImage' , '=' , null)
        ->groupBy('guest_id')
        ->get();
        // return response()->json($courseUsers);
        return view ('admin.courses.indexSavedCoursesUsers' , ['courseGuests' => $courseGuests]);
    }
    public function showSaved($id , $id2){
        $courseShowSaved = GuestCourse::find($id)->with('guests')->with('courses')
        ->where('isSubmit' , '=' , 1)
        ->where('isChecked' , '=' , 0)
        ->where('bankImage' , '=' , null)
        ->where('guest_id' , '=' , $id2)
        ->groupBy('guest_id')
        ->get();
        // return response()->json($courseShowSaved);
        return view ('admin.courses.showSavedCourses' , ['courseShowSaved' => $courseShowSaved]);
    }
    public function deleteSaved($id){
        $deleteSaved = Guest::find($id)->delete();
        return back();
    }
    public function showPaid($id , $id2){
        $courseShowPaid = GuestCourse::find($id)->with('guests')->with('courses')
        ->where('isSubmit' , '=' , 0)
        ->where('isChecked' , '=' , 1)
        ->where('bankImage' , '!=' , null)
        ->where('guest_id' , '=' , $id2)
        ->groupBy('guest_id')
        ->get();
        return view ('admin.courses.showPaidCourses' , ['courseShowPaid' => $courseShowPaid]);
    }
    public function deletePaid($id){
        $deletePaid = Guest::find($id)->delete();
        return back();
    }
    public function paid(){
        $courseGuests = GuestCourse::with('guests')->with('courses')
        ->where('isSubmit' , '=' , 0)
        ->where('bankImage' , '!=' , null)
        ->where('isChecked' , '=' , 1)
        ->groupBy('guest_id')
        ->get();
        // return response()->json($courseUsers);
        return view ('admin.courses.indexPaidCoursesUsers' , ['courseGuests' => $courseGuests]);
    }
}
