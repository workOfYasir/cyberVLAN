<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PostProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function projectDetail()
    {
        $user= Auth::user();
        
        $jobsDetail = Payment::with('payment')->with('post')->get();
        return view('backend.pages.payment.index',['jobsDetail'=>$jobsDetail,'user'=>$user],);
    }
    public function newUserPayment()
    {
        $user= Auth::user();
        
        $jobsDetail = Payment::where('payment_type',1)->where('status',0)->with('payment')->with('post')->get();
        return view('backend.pages.newUserPayment.index',['jobsDetail'=>$jobsDetail,'user'=>$user]);
    }
}
