<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id');
    }
    public function jobTimeline()
    {
        return $this->belongsTo('Spatie\Permission\Models\Permission','job_timeline_id');
    }
    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id')->with('user');
    }
    
}
