<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Service;
use App\Models\PostDetail;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use App\Models\PostProposal;
use Illuminate\Http\Request;
use App\Models\PostDeliverable;
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
    public function fetchPosts()
    {
        $user = Auth::user();
        $post = Post::with('postDetail')->with('bid')->get();
        // dd($post);
        return view('backend.pages.postDetail.index',compact('post','user'));
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

        $post->hour_max=$request->get('hours_max');
        $post->day_max=$request->get('days_max');
        
        $post->day_min=$request->get('days_min');
        $post->hour_min=$request->get('hours_min');
        

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

    

    public function myPost($uuid)
    {
        $isUuid = Str::isUuid($uuid);
        $user_uuid = Auth::user()->unni_id;
        if ($isUuid && $user_uuid == $uuid) {
            $user = User::where('unni_id', $uuid)->first();
            $user_details = UserDetails::where('user_id', $uuid)->with('freelancerWork')->with('freelancerSkill')->first();
            $p_id = $user->getAllPermissions()->pluck('id');
            // dd($p_id);
            // $p_id = $permissions;
            $postDetail = Post::with('postDetail')->with('user')->get();
            $post_id = Post::whereHas('postDetail', function($q) use($p_id){
                    $q->whereIn('job_timeline_id',$p_id);
            })->with('postDetail')->pluck('id');
 
            // $post_id = PostDetail::whereIn('job_timeline_id',$p_id)->get();
            $postTimeline = Post::whereHas('postDetail', function($q) use($p_id){
                $q->whereIn('job_timeline_id', $p_id);
            })->where('user_id',Auth::user()->id)->with('postDetail')->with('bid')->get();
       
            $services = Service::orderBy('name')->get();
            $timelines = Permission::whereIn('id',$p_id)->get();
            // $bids = PostProposal::where('job_poster_id',$uuid)->whereIn('post_id',$post_id)->pluck('post_id');

            return view('frontend.posts.my-posts', compact('user', 'user_details','services','postTimeline','postDetail','timelines','uuid'));
        } else {
            return redirect()->route('home')
                ->with('error', 'Something went wrong. Try again...');
        }
     
    }
    public function bid($uuid)
    {
        $isUuid = Str::isUuid($uuid);
        $user_uuid = Auth::user()->unni_id;
        if ($isUuid && $user_uuid == $uuid) {
            $user = User::where('unni_id', $uuid)->first();
            $user_details = UserDetails::where('user_id', $uuid)->with('freelancerWork')->with('freelancerSkill')->first();
            $permissions = $user->getAllPermissions();
            $p_id = $permissions[0]->id;
            $postDetail = Post::with('postDetail')->with('user')->get();
            $post_id = Post::whereHas('postDetail', function($q) use($p_id){
                    $q->where('job_timeline_id', '=', $p_id);
            })->with('postDetail')->pluck('id')->toArray();
            $postTimeline = Post::whereHas('postDetail', function($q) use($p_id){
                $q->where('job_timeline_id', '=', $p_id);
            })->where('user_id',Auth::user()->id)->with('postDetail')->get();
            $services = Service::orderBy('name')->get();
            $timelines = Permission::where('id',$permissions[0]->id)->get();
            $bids = PostProposal::where('job_poster_id','=',$uuid)->whereIn('post_id',$post_id)->with('user')->with('post')->with('deliverables')->get();
          
            $postDeliverables = PostDeliverable::whereIn('proposal_id',[$bids[0]->id])->get();
            $deliverableCount = count($postDeliverables);
            return view('frontend.posts.all-bids', compact('user', 'user_details', 'bids','services','postTimeline','postDetail','timelines','postDeliverables','deliverableCount','uuid'));
        } else {
            return redirect()->route('home')
                ->with('error', 'Something went wrong. Try again...');
        }
     
    }
    
  
}
