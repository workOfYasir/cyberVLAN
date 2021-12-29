<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerSkill extends Model
{
    use HasFactory;
    protected $fillable = ['freelancer_skill_id','user_details_id'];


    public function user()
    {
        return $this->belongsTo('App\Models\UserDetail','user_details_id')->with('userDetails');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service','freelancer_skill_id','id')->with('category');
    }
    
    
}
