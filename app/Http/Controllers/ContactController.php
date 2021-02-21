<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index(){
        return view('contact-us',Option::all_options());
    }
    public function send(Request $request){
        Mail::to('info@mantis-agriculture.com')->send(new ContactMail([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]) );
        return redirect( route('home'));
    }
}
