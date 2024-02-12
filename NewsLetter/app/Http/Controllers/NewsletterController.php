<?php

namespace App\Http\Controllers;
use App\Events\UserSubscribed;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter');
    }
    public function subscribe(Request $request)
    {
        $request->validate([
        'email' => 'required|unique:newsltter,email'
        ]);

        event(new UserSubscribed($request->input('email')));

        return back();

    }
}
