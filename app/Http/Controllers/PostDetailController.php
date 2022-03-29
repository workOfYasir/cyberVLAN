<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Service;
use App\Models\PostDetail;
use App\Models\PostProposal;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
// use willvincent\Rateable\Tests\models\Rating;

class PostDetailController extends Controller
{
    public function show()
    {

        if(Auth::user()){
            if(Auth::user()->approve==0){

                return redirect()->route('profile', [Auth::user()->unni_id]);
                
            }else{
                $approve=1;
                $services = Service::with('category')->get();
                $service_ids = Service::pluck('id');
                $open_jobs = PostDetail::whereIn('service_id',$service_ids)->where('approve',1)->count();
                $postDetail = Post::whereHas('postDetail', function($q) use($approve){
                        $q->where('approve',  $approve);
                })->get();
                       
                $userDetail = User::role('client')->with('userDetails')->with('skills')->with('work')->paginate(5);
                $freelancerDetail = User::role('freelancer')->with('userDetails')->with('skills')->with('work')->paginate(3);
                return view('frontend.home',['postDetail'=>$postDetail,'services'=>$services,'open_jobs'=>$open_jobs,'userDetail'=>$userDetail,'freelancerDetail'=>$freelancerDetail]); 
            }
        }else{
            $approve=1;
            $services = Service::with('category')->get();
            $service_ids = Service::pluck('id');
            $open_jobs = PostDetail::whereIn('service_id',$service_ids)->where('approve',1)->count();
            $postDetail =  Post::whereHas('postDetail', function($q) use($approve){
                    $q->where('approve',  $approve);
            })->get();
            
            $userDetail = User::role('client')->with('userDetails')->with('skills')->with('work')->paginate(5);
            $freelancerDetail = User::role('freelancer')->with('userDetails')->with('skills')->with('work')->paginate(3);
            return view('frontend.home',['postDetail'=>$postDetail,'services'=>$services,'open_jobs'=>$open_jobs,'userDetail'=>$userDetail,'freelancerDetail'=>$freelancerDetail]);
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
        
        return view('frontend.posts.post-detail',['postDetail'=>$postDetail,'postDetailList'=>$postDetailList]);
    }
    public function allPostDetail($id)
    {
        $postDetail = Post::where('id',$id)->with('postDetail')->with('user')->get();
        $user = auth()->user();
        $p_id = $user->getAllPermissions()->pluck('id');
        $postDetailList = Post::whereHas('postDetail', function($q) use($p_id){
                $q->whereIn('job_timeline_id', $p_id);
        })->with('postDetail')->with('user')->get();
        
        return view('frontend.posts.post-detail',['postDetail'=>$postDetail,'postDetailList'=>$postDetailList]);
    }
    // public function reviewDetail($id)
    // {
    //     $review= PostProposal::where('post_id',$id)->where('status',2)->get();
    //     $rating = Rating::where('post_id',$id)->exists();
    //     // dd($rating);
    //     $candidate_id = PostProposal::where('id',$id)->where('status',2)->pluck('candidate_id');
    //     // $reviewedTo = User::where('unni_id',$candidate_id)->with(['jobCandidate' => function ($query) use($candidate_id,$id) {
    //     //     $query->where('candidate_id',$candidate_id)->where('post_id',$id)->with('post');
    //     // }])->get();
    //     $user = User::where('unni_id',$candidate_id)->get();
    //     // dd($review);
    //     $postDetail = Post::where('id',$id)->with('postDetail')->with('user')->get();
    //     $user = auth()->user();
    //     $p_id = $user->getAllPermissions()->pluck('id');
    //     $postDetailList = Post::whereHas('postDetail', function($q) use($p_id){
    //             $q->whereIn('job_timeline_id', $p_id)->where('approve', 1);
    //     })->with('postDetail')->with('user')->get();
    //     // $comment = Rating::where('rateable_id',$reviewedTo[0]->id)->get();
    //     // dd($comment);
    //     return view('frontend.posts.post-detail',['postDetail'=>$postDetail,'postDetailList'=>$postDetailList,'review'=>$review,'user'=>$user,'rating'=>$rating]);
    // }
   
    public function approve($id)
    {
      
        $status = Post::where('id',$id)->pluck('approve')->first();

        if($status==1){
            Post::where('id',$id)->update([
                'approve'=>0
            ]);
            return response([$id,0]);
        }else if($status==0){
            Post::where('id',$id)->update([
                'approve'=>1
            ]);
            return response([$id,1]);
        }
        
    }

    public function projectAssigned($id)
    {
        $status = Post::where('id',$id)->pluck('approve')->first();
        if($status == 1){
            $projectAssigned = Post::where('id',$id)->update([
                'approve'=>0
            ]);
            return response(0);
        }else{
            $projectAssigned = Post::where('id',$id)->update([
                'approve'=>1
            ]);
            return response(1);
        }

    }
    
    public function posts()
    {   
        $user = auth()->user();
       $post = Post::with('postDetail')->get();
    //    dd($postDetail);
       return view('backend.pages.posts.index',['post'=>$post,'user'=>$user]);
    }
    public function list()
    {
        // get logged-in user
        $user = auth()->user();
        $p_id = $user->getAllPermissions()->pluck('id');
        $services = Service::all();
       if(count($p_id)==0){
           $noTimeline = 'No Timeline added in your profile';
        return view('frontend.posts.post-listing',['services'=>$services ,'noTimeline'=>$noTimeline]);
       }
        // // $p_id = $permissions[0->id;
        // $postDetail = Post::whereHas('postDetail', function($q) use($p_id){
        //         $q->whereIn('job_timeline_id', $p_id)->where('approve',1);
        // })->with('postDetail')->with('user')->get();
        // // dd($postDetail);


        return view('frontend.posts.post-listing',['services'=>$services]);
    }

}
