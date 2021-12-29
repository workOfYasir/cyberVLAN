<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'user_id',
        'user_cover',
        'user_profile',
        'user_mobile',
        'user_phone',
        'user_dob',
        'user_gender',
        'user_address_country',
        'user_address_city',
        'user_address_zip',
        'user_address',
        'user_website',
        'user_github',
        'user_linkedin',
        'user_facebook',
        'user_insta',
        'user_twitter',
        'user_account_title',
        'user_account_bank',
        'user_account_iban',
        'description',
        'referral_user'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
    public function freelancerSkill()
    {
        return $this->hasMany('App\Models\FreelancerSkill', 'user_details_id', 'user_id')->with('service');
    }
    public function freelancerWork()
    {
        return $this->hasMany('App\Models\FreelancerWork', 'user_details_id', 'user_id');
    }
    public function referralUser()
    {
        return $this->hasOne('App\Models\User','unni_id','referral_user');
    }
}
