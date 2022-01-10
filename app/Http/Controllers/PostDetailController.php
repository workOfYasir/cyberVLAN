<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Service;
use App\Models\PostDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PostDetailController extends Controller
{
    public function show()
    {

        if(Auth::user()){
            if(Auth::user()->approve==0){

                return redirect()->route('profile', [Auth::user()->unni_id]);
                
            }else{
                $services = Service::all();
                $postDetail = Post::with('postDetail')->with('user')->get();
                $userDetail = User::role('client')->with('userDetails')->with('skills')->with('work')->get();
                $freelancerDetail = User::role('freelancer')->with('userDetails')->with('skills')->with('work')->get();
                return view('frontend.home',['postDetail'=>$postDetail,'services'=>$services,'userDetail'=>$userDetail,'freelancerDetail'=>$freelancerDetail]); 
            }
        }else{
            $services = Service::all();
            $postDetail = Post::with('postDetail')->with('user')->get();
            $userDetail = User::role('client')->with('userDetails')->with('skills')->with('work')->get();
            $freelancerDetail = User::role('freelancer')->with('userDetails')->with('skills')->with('work')->get();
            return view('frontend.home',['postDetail'=>$postDetail,'services'=>$services,'userDetail'=>$userDetail,'freelancerDetail'=>$freelancerDetail]);
        }
        
    }
    public function detail($id)
    {
        $postDetail = Post::where('id',$id)->with('postDetail')->with('user')->get();
        // dd($postDetail);
        return view('frontend.posts.post-detail',['postDetail'=>$postDetail]);
    }
   
    public function list()
    {
        // get logged-in user
        $user = auth()->user();
        $permissions = $user->getAllPermissions();
        $p_id = $permissions[0]->id;
        $postDetail = Post::with('postDetail')->with('user')->get();
        $postTimeline = Post::whereHas('postDetail', function($q) use($p_id){
                $q->where('job_timeline_id', '=', $p_id);
        })->with('postDetail')->get();
        $services = Service::all();
        $timelines = Permission::where('id',$permissions[0]->id)->get();

        return view('frontend.posts.post-listing',['postDetail'=>$postDetail,'postTimeline'=>$postTimeline,'services'=>$services,'timelines'=>$timelines]);
    }

}
