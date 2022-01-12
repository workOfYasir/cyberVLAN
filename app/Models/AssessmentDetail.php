<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentDetail extends Model
{
    use HasFactory;
    public function score()
    {
        return $this->belongsTo('App\Models\Result','id','assessment_id');
    }
    public function freelancerSkill()
    {
        return $this->hasMany('App\Models\FreelancerSkill', 'freelancer_skill_id', 'service_id')->with('service');
    }
}
