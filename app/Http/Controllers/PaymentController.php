<?php

namespace App\Http\Controllers;

use App\Models\PostProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function projectDetail()
    {
        $user= Auth::user();
        
        $jobsDetail = PostProposal::with('user')->with('post')->get();
    //    dd($jobsDetail);
        return view('backend.pages.payment.index',['jobsDetail'=>$jobsDetail,'user'=>$user],);
    }
}
