<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;
    public function freelancerSkill()
    {
        return $this->belongsTo('App\Models\FreelancerSkill','user_detail_id')->with('service_id');
    }
    public function freelancerWork()
    {
        return $this->belongsTo('App\Models\FreelancerWork','service_id')->with('service_id');
    }
}
