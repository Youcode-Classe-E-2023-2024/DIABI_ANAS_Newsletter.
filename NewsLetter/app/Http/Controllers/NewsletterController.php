<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Newsletter;
use App\Models\User;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;


class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter');
    }

    public function subscribe(Request $request)
    {   
        $request->validate([
            'email'=>'required|unique:newsletter,email'
        ]);
        
        event(new UserSubscribed($request->input('email')));
        
        return response()->json(['status' => 'success', 'message' => 'Subscription successful']);
    }


    public function sendNewsletter()
{
    $subs = Newsletter::all();

    foreach ($subs as $sub) {
        Mail::to($sub->email)->send(new NewsletterMail($subs)); // Pass $subs to the mail constructor
    }

    return redirect()->route('admin.subscribers')->with('success', 'Newsletter sent successfully!');
}
    
}
