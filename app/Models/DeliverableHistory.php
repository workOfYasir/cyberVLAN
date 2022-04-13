<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverableHistory extends Model
{
    use HasFactory;
    public function proposalHistory()
    {
        return $this->belongsTo('App\Models\DeliverableHistory','proposal_id','id');
    }
    public function userHistory()
    {
        return $this->belongsTo('App\Models\DeliverableHistory','user_id','id');
    }
}

