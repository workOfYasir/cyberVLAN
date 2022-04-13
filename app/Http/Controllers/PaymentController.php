<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function projectDetail()
    {
        $user= Auth::user();
        
        $jobsDetail = Payment::with('payment')->with('post')->get();
       dd($jobsDetail);
        return view('backend.pages.payment.index',['jobsDetail'=>$jobsDetail,'user'=>$user],);
    }
}
