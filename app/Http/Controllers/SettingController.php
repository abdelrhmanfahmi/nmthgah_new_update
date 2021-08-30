<?php

namespace App\Http\Controllers;

use App\Setting;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Contact;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view ('admin.settings.index' , ['settings' => $settings]);
    }
    public function edit($id){
        $settings = Setting::find($id);
        return view ('admin.settings.edit' , ['settings' => $settings]);
    }
    public function update(Request $r , $id){
        $validator = Validator::make($r->all(), [
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'title' => 'required',
            'breif' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'why' => 'required'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $update = Setting::find($id);
            if(empty($update))
                return redirect('admin/settings');
            $update->twitter = $r->get('twitter');
            $update->instagram = $r->get('instagram');
            $update->linkedin = $r->get('linkedin');
            $update->title = $r->get('title');
            $update->breif = $r->get('breif');
            $update->vision = $r->get('vision');
            $update->mission = $r->get('mission');
            $update->why = $r->get('why');
            $update->admin_id = 1;
            if($r->has('logo'))
                $update->logo = uploadNow('logo', $r);
            if($r->has('image'))
                $update->image = uploadNow('image', $r);
            $update->save();
        }
        return redirect()->route('settings.index');
        
        // $settings = Setting::find($id);
        // $file = $request->file('logo');
        // $destinationPath = public_path(). '/uploads/';
        // $filename = $file->getClientOriginalName();
        // $file->move($destinationPath, $filename);
        // $settings->logo = $filename;
        // $settings->twitter = $request->input('twitter');
        // $settings->instagram = $request->input('instagram');
        // $settings->linkedin = $request->input('linkedin');
        // $settings->title = $request->input('title');
        // $settings->breif = $request->input('breif');
        // $file = $request->file('image');
        // $destinationPath = public_path(). '/uploads/';
        // $filename = $file->getClientOriginalName();
        // $file->move($destinationPath, $filename);
        // $settings->image = $filename;
        // $settings->vision = $request->input('vision');
        // $settings->mission = $request->input('mission');
        // $settings->why = $request->input('why');
        // $settings->admin_id = Auth::guard('admin')->user()->id;

        // $settings->save();
        // return redirect()->route('settings.index');
    }
    public function destroy($id){
        $settings = Setting::find($id)->delete();
        return redirect()->route('settings.index');
    }
    
    public function indexContact(){
        $contacts = Contact::all();
        return view ('admin.contacts.index' , ['contacts' => $contacts]);
    }
    public function editContact($id){
        $contacts = Contact::find($id);
        return view ('admin.contacts.show' , ['contacts' => $contacts]);
    }
    public function updateContact(ContactRequest $request , $id){
        $contacts = Contact::find($id);
        $contacts->linkedin = $request->input('linkedin');
        $contacts->twitter = $request->input('twitter');
        $contacts->instagram = $request->input('instagram');
        $contacts->save();
        return redirect()->route('contacts.index');
    }
}
