<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobHistoryController extends Controller
{
   public function index($id){
       $user = Auth::user();
    $postHistory = Post::where('id',$id)->whereHas('bid',function($q) {
        $q->where('status','!=',0);
    })->with('bid')->with('user')->first();
    // dd($postHistory);
    return view('backend.pages.jobHistory.index',compact('postHistory','user'));
   }
}
