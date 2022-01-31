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
        $user = auth()->user();
        $p_id = $user->getAllPermissions()->pluck('id');
        $postDetailList = Post::whereHas('postDetail', function($q) use($p_id){
                $q->whereIn('job_timeline_id', $p_id)->where('approve', 1);
        })->with('postDetail')->with('user')->get();
        // dd($postDetailList);
        return view('frontend.posts.post-detail',['postDetail'=>$postDetail,'postDetailList'=>$postDetailList]);
    }
   
    public function approve($id)
    {
      
        $status = PostDetail::where('id',$id)->pluck('approve')->first();

        if($status==1){
            PostDetail::where('id',$id)->update([
                'approve'=>0
            ]);
            return response($id,0);
        }else if($status==0){
            PostDetail::where('id',$id)->update([
                'approve'=>1
            ]);
            return response($id,1);
        }
        
    }

    public function projectAssigned($id)
    {
        $status = PostDetail::where('id',$id)->pluck('approve')->first();
        if($status == 1){
            $projectAssigned = PostDetail::where('id',$id)->update([
                'approve'=>0
            ]);
            return response(0);
        }else{
            $projectAssigned = PostDetail::where('id',$id)->update([
                'approve'=>1
            ]);
            return response(1);
        }

    }
    
    public function posts()
    {   
        $user = auth()->user();
       $postDetail = PostDetail::with('post')->get();
       return view('backend.pages.posts.index',['postDetail'=>$postDetail,'user'=>$user]);
    }
    public function list()
    {
        // get logged-in user
        $user = auth()->user();
        $p_id = $user->getAllPermissions()->pluck('id');
        // $p_id = $permissions[0->id;
        $postDetail = Post::whereHas('postDetail', function($q) use($p_id){
                $q->whereIn('job_timeline_id', $p_id)->where('approve', 1);
        })->with('postDetail')->with('user')->get();
        $postTimeline = Post::whereHas('postDetail', function($q) use($p_id){
                $q->whereIn('job_timeline_id', $p_id)->where('approve',1);
        })->with('postDetail')->get();
        $services = Service::all();
        $timelines = Permission::where('id',$permissions[0]->id)->get();

        return view('frontend.posts.post-listing',['services'=>$services,'timelines'=>$timelines,'postDetail'=>$postDetail]);
    }

}
