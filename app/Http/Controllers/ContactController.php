<?php

namespace App\Http\Controllers;

use App\Contact;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view ('admin.contacts.index' , ['contacts' => $contacts]);
    }
    public function edit($id){
        $contacts = Contact::find($id);
        return view ('admin.contacts.show' , ['contacts' => $contacts]);
    }
    public function update(ContactRequest $request , $id){
        $contacts = Contact::find($id);
        $contacts->linkedin = $request->input('linkedin');
        $contacts->twitter = $request->input('twitter');
        $contacts->instagram = $request->input('instagram');
        $contacts->save();
        return redirect()->route('contactsAdmin.index');
    }
}
