<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id')->with('userDetails');
    }

    public function postDetail()
    {
        return $this->hasMany('App\Models\PostDetail')->with('service')->with('jobTimeline');
    }
    public function bid()
    {
        return $this->hasMany('App\Models\PostProposal')->with('deliverables')->with('user')->with('proposalHistory');
    }
    public function ratingOn()
    {
        return $this->hasMany(Rating::class)->with('user')->with('rateable');
    }
   
}
