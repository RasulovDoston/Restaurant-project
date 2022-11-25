<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $data = Restaurant::get();
        return view ('menu', compact('data'));
    }

    public function book()
    {
        return view ('layouts.booktable');
    }
    

    public function save(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'date'=>'required',
            'time'=>'required',
            'people'=>'required',
            'message'=>'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $date = $request->date;
        $time = $request->time;
        $people = $request->people;
        $message = $request->message;


        $user = new Restaurant();
        $user ->name = $name;
        $user ->email = $email;
        $user ->phone = $phone;
        $user ->date = $date;
        $user ->time = $time;
        $user ->people = $people;
        $user ->message = $message;
        $user ->save();

        
        return redirect()->back()->with('success', 'Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!');
    }

    public function saved(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;


        $user = new Contact();
        $user ->name = $name;
        $user ->email = $email;
        $user ->subject = $subject;
        $user -> massege = $message;
        $user ->save();

        return redirect()->back()->with('success', 'Your message has been sent. Thank you!');
    }


}
