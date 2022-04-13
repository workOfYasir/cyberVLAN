<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDeliverable extends Model
{
    use HasFactory;
    public function deliverable()
    {
        return $this->belongsTo('App\Models\PostDeliverable','proposal_id');
    }
}
