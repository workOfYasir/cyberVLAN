<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Rating;
use App\Models\Message;
use App\Models\PostDetail;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use App\Models\PostProposal;
use Illuminate\Http\Request;
use App\Models\PostDeliverable;
use App\Models\DeliverableHistory;
use Illuminate\Support\Facades\Auth;

class PostProposalController extends Controller
{
    public function propsal(Request $request)
    {
    
        $postProposal = new PostProposal;

        $candidate = Auth::user();
        $postProposal->job_poster_id = $request->get('job-poster');
        $postProposal->candidate_id = $candidate->unni_id;
        $postProposal->post_id = $request->get('job-post');
        $postProposal->job_proposal = $request->get('job-proposal');
        $postProposal->job_budget = $request->get('job-budget');
        $postProposal->deliverable = $request->deliverable;
        $postProposal->save();
        foreach ($request->title as $key => $title) {
            $postDeliverable = new PostDeliverable;
            $postDeliverable->proposal_id = $postProposal->id;
            $postDeliverable->deliverable_title = $title;
            $postDeliverable->deliverable_duration = $request->days[$key];
            $postDeliverable->save();
            $deliverableHistory = new DeliverableHistory;
            $deliverableHistory->user_id = Auth::user()->id;
            $deliverableHistory->proposal_id = $postProposal->id;
            $deliverableHistory->deliverable_title = $title;
            $deliverableHistory->deliverable_duration = $request->days[$key];
            $deliverableHistory->action = 'created'; 
            $deliverableHistory->save();
        }
        


        $reciever_id = User::where('unni_id',$request->get('job-poster'))->pluck('id')->first();
        $link = request()->getSchemeAndHttpHost().'/post/bid_detail/'.$postProposal->id;
    
        $messaage='link='.$link.'&msg='.$request->get('job-proposal');
        $data=new Message;
    	$data->message=$messaage;
    	$data->user_id=$candidate->id;
    	$data->receiver_id=$reciever_id;
   
    	$data->save();


        return redirect()->back();

    }

 
    public function assign($id)
    {
      
        PostProposal::where('id',$id)->update([
            'status'=>1
        ]);
      return redirect()->back();
    }
    public function complete($id)
    {
      
        PostProposal::where('id',$id)->update([
            'status'=>2
        ]);
      return redirect()->back();
    }
    public function proposalHistories(){
        $proposalHistory = DeliverableHistory::all();
        return view('backend.pages.deliverableHistory.index',compact('proposalHistory'));
    }
    public function list($uuid)
    {
        $isUuid = Str::isUuid($uuid);
        $user_uuid = Auth::user()->unni_id;
        if ($isUuid && $user_uuid == $uuid) {
            $user = User::where('unni_id', $uuid)->first();
            $user_details = UserDetails::where('user_id', $uuid)->with('freelancerWork')->with('freelancerSkill')->first();
            $permissions = $user->getAllPermissions();
            $p_id = $permissions[0]->id;
            $post_id = Post::whereHas('postDetail', function($q) use($p_id){
                $q->where('job_timeline_id', '=', $p_id);
            })->with('postDetail')->pluck('id')->toArray();
            $reviews = PostProposal::where('job_poster_id','=',$uuid)->whereIn('post_id',$post_id)->where('status',1)->with('user')->with('post')->get();

            return view('frontend.posts.review-list', compact('user', 'user_details','reviews'));
        } else {
            return redirect()->route('home')
                ->with('error', 'Something went wrong. Try again...');
        }
        
    }

    public function milestoneComment(Request $request)
    {

        if(count($request->milestone)!=0){
            foreach($request->milestone as $key => $milestone)
            {
                PostDeliverable::where('id',$request->deliverable_id[$key])->update([
                    'deliverable_title'=>$milestone,
                    'deliverable_duration'=>$request->duration[$key],
                ]);
                $deliverableHistory = new DeliverableHistory;
                $deliverableHistory->user_id = Auth::user()->id;
                $deliverableHistory->proposal_id = $request->proposal_id;
                $deliverableHistory->deliverable_title = $milestone;
                $deliverableHistory->deliverable_duration = $request->duration[$key];
                $deliverableHistory->action = 'updated';
                $deliverableHistory->save();

               
            }
            $reciever_id = $request->job_candidate;
            $user_id = $request->job_poster;
            $link = request()->getSchemeAndHttpHost().'/post/bid_detail/'.$request->proposal_id;
        
            $messaage='link='.$link.'&msg=MileStones Updated';
            $data=new Message;
            $data->message=$messaage;
            $data->user_id=$user_id;
            $data->receiver_id=$reciever_id;

            $data->save();
    
        }else{
        
            foreach($request->milestone_comment as $key => $comment)
            {     
                PostDeliverable::where('id',$request->deliverable_id[$key])->update([
                    'deliverable_description'=>$comment
                ]);
                $deliverableHistory = new DeliverableHistory;
                $deliverableHistory->user_id = Auth::user()->id;
                $deliverableHistory->proposal_id = $request->proposal_id;
                $deliverableHistory->deliverable_description = $comment;
                $deliverableHistory->action = 'updated';
                $deliverableHistory->save();
                    
            }       
            $reciever_id = $request->job_candidate;
            $user_id = $request->job_poster;
            $link = request()->getSchemeAndHttpHost().'/post/bid_detail/'.$request->proposal_id;
        
            $messaage='link='.$link.'&msg=MileStone Need to be Update Comments Added';
            $data=new Message;
            $data->message=$messaage;
            $data->user_id=$user_id;
            $data->receiver_id=$reciever_id;

            $data->save();
                // print_r($request->deliverable_id[$key]);
            
        }
        return redirect()->back();

    }
    public function bidDetail($id)
    {
        $bidDetail = PostProposal::where('id',$id)->with('user')->with('post')->first();
        $postDeliverable = PostDeliverable::where('proposal_id',$id)->get();
        return view('frontend.posts.bid-details',compact('bidDetail','postDeliverable'));
    }
    public function reviewDetail($bid_id,$post_id)
    {
        $bidDetail = PostProposal::where('id',$bid_id)->with('user')->with('post')->first();

        $review= PostProposal::where('post_id',$post_id)->where('status',2)->with('user')->with('post')->get();
        $rating = Rating::where('post_id',$post_id)->exists();

        $candidate_id = PostProposal::where('id',$bid_id)->where('status',2)->pluck('candidate_id');
        
        $user = User::where('unni_id',$candidate_id)->get();
     
        $postDetail = Post::where('id',$bid_id)->with('postDetail')->with('user')->get();
        $user = auth()->user();
        $p_id = $user->getAllPermissions()->pluck('id');
        $postDetailList = Post::whereHas('postDetail', function($q) use($p_id){
                $q->whereIn('job_timeline_id', $p_id)->where('approve', 1);
        })->with('postDetail')->with('user')->get();

        


        // $comment = Rating::where('rateable_id',$reviewedTo[0]->id)->get();
        // dd($comment);
        return view('frontend.posts.bid-details',compact('bidDetail','review','rating'));
    }
}
