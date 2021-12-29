<?php

namespace App\Http\Controllers;

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

        return redirect()->back();

    }
}
