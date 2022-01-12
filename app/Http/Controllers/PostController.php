<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use App\Models\PostDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PostController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $permissions = Permission::all();
        $services = Service::orderBy('name')->get();
        return view('frontend.posts.create-post', compact('permissions', 'user','services'));
    }
    public function store(Request $request)
    {

        $post=new Post();
        $post->user_id = Auth::id();
        $post->job_title=$request->get('job-title');
        $post->job_description=$request->get('job-description');
        $post->job_requirment=$request->get('job-requirments');
        $post->job_budget=$request->get('job-budget');
        $post->budget_status=$request->get('budget_status');
        $post->save();

        if($post->save()) {   
            foreach($request->service as $skill) {
                $postDetail=new PostDetail;
                $postDetail->post_id=$post->id;
                $postDetail->job_timeline_id=$request->job_timeline;
                $postDetail->service_id=$skill;
                $postDetail->save();
            }
        }
        return redirect()->back();



    }

  
}
