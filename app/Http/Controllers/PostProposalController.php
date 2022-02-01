<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\PostDetail;
use Illuminate\Support\Str;
use App\Models\PostProposal;
use Illuminate\Http\Request;
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
        $postProposal->save();


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



    public function bidDetail($id)
    {
        $bidDetail = PostProposal::where('post_id',$id)->with('user')->with('post')->first();

        return view('frontend.posts.bid-details',compact('bidDetail'));
    }
}
