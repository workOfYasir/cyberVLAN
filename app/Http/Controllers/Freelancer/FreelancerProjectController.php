<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\FreelancerProject;
use Illuminate\Http\Request;

class FreelancerProjectController extends Controller
{
    public function remove($id)
    {
       $project = FreelancerProject::find($id);
       $project->delete();
        return response()->json(['project'=>$project,'index'=>$id]); 
    }
}
