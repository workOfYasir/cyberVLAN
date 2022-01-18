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
        
        $jobsDetail = PostProposal::where('job_poster_id',$user->unni_id)->with('user')->with('post')->get();
       
        return view('backend.pages.payment.index',['jobsDetail'=>$jobsDetail,'user'=>$user],);
    }
}
