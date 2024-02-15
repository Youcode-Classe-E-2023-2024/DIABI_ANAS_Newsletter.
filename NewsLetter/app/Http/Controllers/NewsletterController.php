<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Newsletter;

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
    
}
