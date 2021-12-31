<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\FreelancerWork;
use Illuminate\Http\Request;

class FreelancerWorkController extends Controller
{
    public function remove($id)
    {
       $work = FreelancerWork::find($id);
       $work->delete();
        return response()->json(['work'=>$work,'index'=>$id]); 
    }
}
