<?php

namespace App\Http\Controllers;
use App\Models\Newsletter;


use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function index()
    {
        $Subs = Newsletter::all();
        return view('admin.Subs.index', compact('Subs'));
    }



    public function destroy(Newsletter $Sub)
    {
       
        $Sub->delete();

        return redirect()->route('Subs.index')->with('success', 'Subscriber deleted successfully');
    }
}
