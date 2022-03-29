<?php

namespace App\Models;

use App\Models\Rating;
use willvincent\Rateable\Rateable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, HasRoles, Rateable, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'unni_id',
        'first_name',
        'last_name',
        'email',
        'google_id',
        'password',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetails()
    {
        return $this->hasMany('App\Models\UserDetails','user_id','unni_id')->with('referralUser');
    }
    public function skills()
    {
        return $this->hasMany('App\Models\FreelancerSkill','user_details_id','unni_id')->with('service');
    }
    public function work()
    {
        return $this->hasMany('App\Models\FreelancerWork','user_details_id','unni_id');
    }
    public function userReferences()
    {
        return $this->hasMany('App\Models\UserReference','user_id','unni_id');
    }
    public function jobCandidate()
    {
        return $this->hasMany('App\Models\PostProposal','candidate_id','unni_id');
    }
    public function jobPoster()
    {
        return $this->hasMany('App\Models\PostProposal','job_poster_id','unni_id');
    }
    public function ratingTo()
    {
        return $this->hasMany(Rating::class,'rateable_id','id');
    }
    public function ratingBy()
    {
        return $this->hasMany(Rating::class,'user_id','id');
    }
  
}
