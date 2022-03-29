<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostProposal extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User','candidate_id','unni_id')->with('userDetails');
    }
    public function deliverables()
    {
        return $this->hasMany('App\Models\PostDeliverable','proposal_id','id');
    }
    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id')->with('postDetail')->with('ratingOn')->with('bid');
    }
    public function poster()
    {
        return $this->belongsTo('App\Models\User','job_poster_id','unni_id');
    }
    
}
