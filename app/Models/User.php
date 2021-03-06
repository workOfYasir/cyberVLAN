<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, HasRoles, Notifiable;

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
  
}
