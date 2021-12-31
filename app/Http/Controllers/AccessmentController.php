<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
       return view('backend.pages.accessment.index',compact('user'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        dd($request);
    //    return view('backend.pages.accessment.index',compact('user'));
    }
}
