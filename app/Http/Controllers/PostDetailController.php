<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Service;
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
        $postDetail = Post::with('postDetail')->with('user')->get();
        $services = Service::all();
        $timelines = Permission::all();
        return view('frontend.posts.post-listing',['postDetail'=>$postDetail,'services'=>$services,'timelines'=>$timelines]);
    }

}
